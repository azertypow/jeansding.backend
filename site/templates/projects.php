<?php

require_once 'site/Utils/getImageData.php';

/** @var Kirby\Cms\Page $page */
/** @var Kirby\Cms\Site $site */



$symposium = $site->children()->get('mediapage')->children()->get('mediapage/symposium');
//artist-videos
//articles
//projects

//echo '<pre>';
//print_r($symposium);
//echo '</pre>';

echo  json_encode([

  'symposium'     => [
    'description_title'     => $symposium->description_title()->value,
    'description_subtitle'  => $symposium->description_subtitle()->value,
    'description_author'    => $symposium->description_author()->value,
    'text'                  => $symposium->text()->toBlocks()->map(function($block){
      return $block->toHtml();
    })->data(),
    'children'              => $symposium->children()->map(function ($child) {
      return [
        'vimeoLink'             => $child->vimeoLink()->value,
        'author'                => $child->author()->value,
        'category'              => $child->category()->value,
        'description'           => $child->description()->value,
        'article_content'       => $child->article_content()->toBlocks()->map(function($block){
          return $block->toHtml();
        })->data(),
      ];
    })->data()
  ],
  'artist-videos' => '',
    'articles'    => '',
    'projects'    => '',

]);

