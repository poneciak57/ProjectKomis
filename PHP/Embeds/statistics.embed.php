<?php

$dir = dirname(__FILE__);
require_once("$dir/../Classes/statistics.class.php");
$PV = new Statistics;

echo "Views: {$PV->Views()}</br>";
echo "Offers: {$PV->Offers()}</br>";
echo "Clients: {$PV->Clients()}</br>";
echo "Ratings: {$PV->Ratings()}</br>";
