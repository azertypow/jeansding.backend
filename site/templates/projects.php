<?php

require_once 'site/Utils/getImageData.php';

/** @var Kirby\Cms\Page $page */
/** @var Kirby\Cms\Site $site */



$symposium      = $site->children()->get('mediapage')->children()->get('mediapage/symposium');
$artistVideos   = $site->children()->get('mediapage')->children()->get('mediapage/artist-videos');
$articles       = $site->children()->get('mediapage')->children()->get('mediapage/articles');
$projects       = $site->children()->get('mediapage')->children()->get('mediapage/projects');

//echo '<pre>';
//print_r($symposium);
//echo '</pre>';

// todo: clean code: get title and sort dynamic

echo  json_encode([

  'symposium'     => [
    'title'                 => $symposium->title()->value,
    'description_title'     => $symposium->description_title()->value,
    'description_subtitle'  => $symposium->description_subtitle()->value,
    'description_author'    => $symposium->description_author()->value,
    'text'                  => $symposium->text()->toBlocks()->map(function($block){
      return $block->toHtml();
    })->data(),
    'children'              => $symposium->children()->map(function ($child) {
      return [
        'title'                 => $child->title()->value,
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
  'artist-videos' => [
    'title'                 => $artistVideos->title()->value,
  ],
  'articles'      => [
    'title'                 => $articles->title()->value,
  ],
  'projects'      => [
    'title'                 => $projects->title()->value,
  ],

]);

