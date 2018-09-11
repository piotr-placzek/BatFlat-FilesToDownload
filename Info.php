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

return [
    'name'          =>  $core->lang['FilesToDownload']['module_name'],
    'description'   =>  $core->lang['FilesToDownload']['module_desc'],
    'author'        =>  'p.dev',
    'version'       =>  '1.0',
    'compatibility'    =>    '1.3.*',                                // Compatibility with Batflat version
    'icon'          =>  'download',                                 // Icon from http://fontawesome.io/icons/

    'install'       =>  function () use ($core) {
        $core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `pdev_ftd` (
            `id` integer NOT NULL PRIMARY KEY AUTOINCREMENT,
            `icon` text NOT NULL,
            `name` text NOT NULL,
            `slug` text NOT NULL,
            `size` integer NOT NULL DEFAULT 0,
            `path` text NOT NULL
        )");
        if (!file_exists(url('uploads/pdev_ftd'))) {
            if(!mkdir(url('uploads/pdev_ftd'), 0777, true)){
                $core->setNotify('failure',$core->lang['FilesToDownload']['mkdir_fail'].'<br>'.url('uploads/pdev_ftd'));
            }
        }
    },
    'uninstall'     =>  function () use ($core) {
        // If you uncomment line bellow then you lost all data but not files
        // $core->db()->pdo()->exec("DROP TABLE `pdev_ftd`");
        // If you uncomment block bellow then you lost all files but not data
        // if (!deleteDir(url('uploads/pdev_ftd'))) {
        //         $core->setNotify('failure',$core->lang['FilesToDownload']['rmdir_fail'].'<br>'.url('uploads/pdev_ftd'));
        // }
    }
];
