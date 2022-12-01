<?php

require_once 'site/Utils/getImageData.php';

/** @var Kirby\Cms\Page $page */
/** @var Kirby\Cms\Site $site */


echo
  json_encode($page->children()->map(function ($objet) {

//    echo '<pre>';
//    print_r($objet->images()->data());
//    echo '</pre>';

    return [
      'slug'                  => $objet->slug(),
      'title'             => $objet->content()->title()     ->value(),
      'id'                => $objet->content()->id()        ->value(),
      'text'              => $objet->content()->text()      ->value(),
      'category'          => trim( explode(',', $objet   ->content()->category()->value()) ),
      'infoObject'        => $objet->content()->infoObject()->value(),
      'infoMaterial'      => explode(',',
                             $objet->content()->infoMaterial()->value()
                      ),
      'infoDate'          => $objet->content()->infoDate()->value(),
      'infoLocation'      => $objet->content()->infoLocation()->value(),
      'infoMade_in'       => $objet->content()->infoMade_in()->value(),
      'infoPrice'         => $objet->content()->infoPrice()->value(),
      'infoDimensions'    => $objet->content()->infoDimensions()->value(),
      'infoLoan'          => $objet->content()->infoLoan()->value(),
      'img'               => getImageData($objet->images()->data()),
      'vimeoLink'         => $objet->content()->vimeoLink()->value,
    ];
  })->data());

