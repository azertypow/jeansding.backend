<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen.
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */

use Kirby\Cms\Page;
require_once 'site/Utils/getImageData.php';

return [
    'debug' => true,
    'routes' => [
        [
            'pattern' => '/',
            'action'  => function () {
                header('Location: /panel');
                exit();
            }
        ],
        [
            'pattern' => 'get/imageData',
            'action'  => function () {
                header("Access-Control-Allow-Origin: *");
                $page = get('page');
                $fileName = get('file');

                return getJsonEncodeImageData(
                    page(urldecode($page))->file($fileName)
                );
            }
        ],
        [
            'pattern' => 'get/itemList',
            'action'  => function () {
                header("Access-Control-Allow-Origin: *");

                return page('listofobject');
            }
        ],
        [
            'pattern' => 'get/projects',
            'action'  => function () {
                header("Access-Control-Allow-Origin: *");

                return new Page([
                    'slug' => 'projects',
                    'template' => 'projects',
                    'content' => [
                    ]
                ]);
            }
        ],

        [
            'pattern' => 'get/contributors',
            'action'  => function () {
                header("Access-Control-Allow-Origin: *");

                return new Page([
                    'slug' => 'contributors',
                    'template' => 'contributors',
                    'content' => [
                    ]
                ]);
            }
        ],
        [
            'pattern' => 'get/list_of_id_objects',
            'action'  => function () {
                header("Access-Control-Allow-Origin: *");

                return new Page([
                    'slug' => 'listofidobjects',
                    'template' => 'list_of_id_objects',
                    'content' => [
                    ]
                ]);
            }
        ],
    ]
];
