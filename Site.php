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

use Inc\Core\SiteModule;

/**
 * Sample site class
 */
class Site extends SiteModule
{
    /**
     * Example module variable
     *
     * @var string
     */
    protected $foo;

    /**
     * Module initialization
     * Here everything is done while the module starts
     *
     * @return void
     */
    public function init()
    {
        $this->foo = 'Hello';
    }
    /**
     * Register module routes
     * Call the appropriate method/function based on URL
     *
     * @return void
     */
    public function routes()
    {
        // Simple:
        $this->route('FilesToDownload', 'getIndex');
        /*
            * Or:
            * $this->route('sample', function() {
            *  $this->getIndex();
            * });
            *
            * or:
            * $this->router->set('sample', $this->getIndex());
            *
            * or:
            * $this->router->set('sample', function() {
            *  $this->getIndex();
            * });
            */
    }

    /**
     * GET: /sample
     * Called method by router
     *
     * @return string
     */
    public function getIndex()
    {
        $page = [
            'title' => $this->lang('title'),
            'desc' => 'Your page description here',
            'content' => $this->draw('hello.html')
        ];

        $this->setTemplate('index.html');
        $this->tpl->set('page', $page);
    }
}
