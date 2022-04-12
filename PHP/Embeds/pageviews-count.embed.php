<?php

$dir = dirname(__FILE__);
require_once("$dir/../Classes/pageviews.class.php");
$PV = new PageViews;

echo "Views: {$PV->getViews()}</br>";
$PV->addView();
echo "Views: {$PV->getViews()}";
