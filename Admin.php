<?php
/**
* BatFlat - FilesToDownload Module by pplaczek.
* Allows you to add to the page or post a list of files ready to be downloaded directly from the server.
*
* @author       Piotr Płaczek <piotr@pplaczek.pl>
* @copyright    2018 Piotr Płaczek <p.dev>
* @license      MIT https://github.com/piotr-placzek/BatFlat-FilesToDownload/blob/master/LICENSE.md
* @link         https://github.com/piotr-placzek/BatFlat-FilesToDownload/
*/


namespace Inc\Modules\FilesToDownload;

use Inc\Core\AdminModule;

/**
 * Sample admin class
 */
class Admin extends AdminModule
{
    public function init(){
        $this->core->addCss('https://use.fontawesome.com/releases/v5.3.1/css/all.css');
    }
    /**
     * Module navigation
     * Items of the returned array will be displayed in the administration sidebar
     *
     * @return array
     */
    public function navigation()
    {
        return [
            $this->lang('index') => 'index',
        ];
    }

    /**
     * GET: /admin/sample/index
     * Subpage method of the module
     *
     * @return string
     */
    public function getIndex()
    {
        $entries = $this->core->db('pdev_ftd')->toArray();
        return $this->draw('index.html', ['entries' => $entries]);
    }

    public function postSaveFile()
    {
        dump($_FILES);
        if(is_uploaded_file($_FILES['file_path']['tmp_name'])) {
            $dir = UPLOADS.'/pdev_ftd';
            move_uploaded_file($_FILES['file_path']['tmp_name'], $dir."/".$_FILES['file_path']['name']);

            $row = array(
                'icon' => $_POST['file_icon'],
                'name' => $_POST['file_name'],
                'slug' => $_POST['file_slug'],
                'size' => $_FILES['file_path']['size'],
                'file' => $_FILES['file_path']['name'],
                'path' => UPLOADS.'/pdev_ftd/'.$_FILES['file_path']['name']
            );

            if($query = $this->core->db('pdev_ftd')->save($row)){
                $this->notify('success', $this->core->lang['FilesToDownload']['db_save_ok'].' '.$_POST['file_name'].' ('.$_FILES['file_path']['size'].'B)');
            }
            else{
                $this->notify('failure', $this->core->lang['FilesToDownload']['no_files']);
            }
        }
        else{
            $this->notify('failure', $this->core->lang['FilesToDownload']['no_files']);
        }

        redirect(url([ADMIN, 'FilesToDownload', 'index']));
    }

    public function getModify($id){
        $row = $this->core->db('pdev_ftd')->oneArray($id);
        return $this->draw('modify.html', ['element' => $row]);
    }

    public function postModifyFile(){
        if($this->core->db('pdev_ftd')->where('id', $_POST['id'])->update(
            [
                'name' => $_POST['file_name'],
                'slug' => $_POST['file_slug'],
                'icon' => $_POST['file_icon'],
            ]
        )){
            $this->notify('success', $this->core->lang['FilesToDownload']['modify_file_success']);
        }
        else{
            $this->notify('failure', $this->core->lang['FilesToDownload']['modify_file_failure']);
        }

        redirect(url([ADMIN, 'FilesToDownload', 'index']));
    }

    public function getRemove($id){
        $row = $this->core->db('pdev_ftd')->oneArray($id);
        $file = UPLOADS.'/pdev_ftd/'.$row['file'];

        dump($file);

        if (file_exists($file)) {
            if (!unlink($file)) {
                $this->notify('failure', $this->core->lang['FilesToDownload']['delete_file_failure']);
            } else {
                $this->notify('success', $this->core->lang['FilesToDownload']['delete_file_success']);
                $this->core->db('pdev_ftd')->delete($id);
            }
        }
        redirect(url([ADMIN, 'FilesToDownload', 'index']));
    }
}
