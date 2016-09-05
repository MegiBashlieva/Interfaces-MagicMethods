<?php
namespace Classes\HotMegapolisAdvisor;

use Interfaces\ITripAdvisor;
use Classes\City\City;
use Classes\City\MajorCity;

class HotMegapolisAdvisor implements ITripAdvisor
{
	public function rate(City $city)
	{
		if($city instanceof MajorCity){
			return $city->climateData->maxTemperature * 1.5;
		}else {
			return $city->climateData->maxTemperature;
		}
	}
}