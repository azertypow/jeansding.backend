<?php

require_once 'site/Utils/getImageData.php';

/** @var Kirby\Cms\Page $page */
/** @var Kirby\Cms\Site $site */



$symposium      = $site->children()->get('mediapage')->children()->get('mediapage/symposium');
$artistVideos   = $site->children()->get('mediapage')->children()->get('mediapage/artist-videos');
$denimPop       = $site->children()->get('mediapage')->children()->get('mediapage/denimpop');
$projects       = $site->children()->get('mediapage')->children()->get('mediapage/exhibitions');

//echo '<pre>';
//print_r($symposium);
//echo '</pre>';

// todo: clean code: get title and sort dynamic

echo  json_encode([

  $symposium->uid() => [
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
        'uid'                   => $child->uid(),
        'subtitle'              => $child->subtitle()->value,
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
  $artistVideos->uid() => [
    'title'                 => $artistVideos->title()                 ->value,
    'description_title'     => $artistVideos->description_title()     ->value,
    'description_subtitle'  => $artistVideos->description_subtitle()  ->value,
    'description_author'    => $artistVideos->description_author()    ->value,
    'text'                  => $artistVideos->text()->toBlocks()->map(function($block){
      return $block->toHtml();
    })->data(),
    'children'              => $artistVideos->children()->map(function ($child) {
      return [
        'title'                 => $child->title()->value,
        'uid'                   => $child->uid(),
        'subtitle'              => $child->subtitle()->value,
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
  $denimPop->uid()      => [
    'title'                 => $denimPop->title()                 ->value,
    'description_title'     => $denimPop->description_title()     ->value,
    'description_subtitle'  => $denimPop->description_subtitle()  ->value,
    'description_author'    => $denimPop->description_author()    ->value,
    'text'                  => $denimPop->text()->toBlocks()->map(function($block){
      return $block->toHtml();
    })->data(),
    'children'              => $denimPop->children()->map(function ($child) {
      return [
        'title'                 => $child->title()->value,
        'uid'                   => $child->uid(),
        'subtitle'              => $child->subtitle()->value,
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
  $projects->uid()      => [
    'title'                 => $projects->title()->value,
    'description_title'     => $projects->description_title()     ->value,
    'description_subtitle'  => $projects->description_subtitle()  ->value,
    'description_author'    => $projects->description_author()    ->value,
    'text'                  => $projects->text()->toBlocks()->map(function($block){
      return $block->toHtml();
    })->data(),
    'children'              => $projects->children()->map(function ($child) {
      return [
        'title'                 => $child->title()->value,
        'uid'                   => $child->uid(),
        'subtitle'              => $child->subtitle()->value,
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

]);

