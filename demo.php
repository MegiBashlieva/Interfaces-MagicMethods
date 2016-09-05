<?php
use Classes\ClimateInfo\ClimateInfo;
use Classes\City\City;
use Classes\City\MajorCity;
use Classes\TouristsGuide\TouristsGuide;
use Classes\HotMegapolisAdvisor\HotMegapolisAdvisor;

require_once 'outload.php';

$info1 = new ClimateInfo(-12, 35);
$info2 = new ClimateInfo(10, 40);
$info3 = new ClimateInfo(14,20);

$city1 = new City("lovech", "ASD", 1, $info1);
$city2 = new City("pernik", "ASD", 0, $info2);
$city3 = new MajorCity("sofia", "ASD",0.5, $info3, 11000000);

$touristguid = new TouristsGuide(3);
$touristguid->addCity($city1);
$touristguid->addCity($city2);
$touristguid->addCity($city3);
$touristguid->isFahrenheit(false);

$hot = new HotMegapolisAdvisor();

echo $touristguid->getBest($hot);
echo $city3;
