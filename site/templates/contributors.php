<?php

/** @var Kirby\Cms\Page $page */
/** @var Kirby\Cms\Site $site */

$contributorsPage       = $site->children()->get('contributors');

echo
json_encode([
  'activityList' => $contributorsPage->activityList()->split(),
  'contributors' => $contributorsPage->contributors()->toStructure()->map(function ($contributor) {
    return [
      'name'        => $contributor->name()->value(),
      'first_name'  => $contributor->first_name()->value(),
      'activity'    => array_map( function($tag) {
                             return trim( $tag );
                             },explode(',', $contributor->content()->activity()->value()) ),
    ];
  })->data()
]);