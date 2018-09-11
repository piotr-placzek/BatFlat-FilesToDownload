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

    // Registering page for possible use as a homepage
    'pages'            =>  ['Sample Page' => 'FilesToDownload'],

    'install'       =>  function () use ($core) {
    },
    'uninstall'     =>  function () use ($core) {
    }
];
