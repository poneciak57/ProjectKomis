<h1> Index.php </h1>

<?php
require_once "PHP/Classes/pageviews.class.php";
$PV = new PageViews;
$PV->addView();

header("Location: /Pages/home.page.php");
