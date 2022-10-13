<?php

use Kirby\Cms\File;

/**
 * @param File[] $imageFileArray
 * @return  string[][]
 */
function getImageData($imageFileArray)
{
    return array_map(function ($imageFile){
        return [
            'mediaUrl' => $imageFile->mediaUrl(),
        ];
    }, $imageFileArray);
}
