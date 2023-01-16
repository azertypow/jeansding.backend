<?php

use Kirby\Cms\File;

/**
 * @param File[] $imageFileArray
 * @return  string[][]
 */
function getImageData($imageFileArray)
{
    return array_map(function ($imageFile){
        return getJsonEncodeImageData($imageFile);
    }, $imageFileArray);
}



function getJsonEncodeImageData(Kirby\Cms\File $file): array
{
    return [
        'url'       => $file->url(),
        'mediaUrl'  => $file->mediaUrl(),
        'width'     => $file->width(),
        'height'    => $file->height(),
        'resize'    => [
            'tiny'      => $file->resize(50, null, 10)->url(),
            'small'     => $file->resize(500)->url(),
            'reg'       => $file->resize(1280)->url(),
            'large'     => $file->resize(1920)->url(),
        ]
    ];
}
