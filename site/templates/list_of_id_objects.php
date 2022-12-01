<?php

require_once 'site/Utils/getImageData.php';

/** @var Kirby\Cms\Page $page */
/** @var Kirby\Cms\Site $site */

$objectsPage       = $site->children()->get('listofobject');

echo
json_encode([
  'objectsID' => array_values($objectsPage->children()->map(function ($objet) {
    return [
      'name'    => $objet->content()->id()->value() . ' // ' . $objet->content()->title()->value(),
      'slug'    => $objet->slug(),
      'title'   => $objet->content()->title()->value(),
      'id'      => $objet->content()->id()->value(),
    ];
  })->data())
]);