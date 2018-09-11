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
        $entry = array(
            'id' => 0,
            'icon' => 'default',
            'name' => 'Test entry',
            'slug' => 'test_entry',
            'size' => 10,
            'path' => 'test_file_entry.temp',
        );

        $entries = array(
            $entry,
            $entry,
            $entry,
            $entry,
            $entry
        );

        return $this->draw('index.html', ['entries' => $entries]);
    }
}
