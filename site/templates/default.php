<?php
/** @var Kirby\Cms\Page $page */
/** @var Kirby\Cms\Site $site */


echo json_encode($page->toArray());
