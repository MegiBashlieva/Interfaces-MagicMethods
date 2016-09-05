<?php
namespace Classes\TouristsGuide;

use Classes\City\City;
use Interfaces\ITripAdvisor;

class TouristsGuide
{
	private $totalCities;
	private $cities;
	
	public function __construct($totalCities)
	{
		$this->totalCities=$totalCities;
		$this->cities = [];
	}
	
	public static function convertToFahrenheit($degrees)
	{
		return ($degrees*9/5 + 32);
	}
	
	public function addCity(City $city)
	{
		if($this->totalCities > 0){
			$this->cities[] = $city;
			$this->totalCities--;
		}
	}
	public function  isFahrenheit($isFahrenheit)
	{
		if($isFahrenheit){
			foreach ($this->cities as $key=>$value){
				echo "Name: ".$value->name.
				" min temperature: ".static::convertToFahrenheit($value->climateData->minTemperature)."F".
				" max temperature: ".static::convertToFahrenheit($value->climateData->maxTemperature)."F".PHP_EOL;
			}
		}else {
			foreach ($this->cities as $key=>$value){
				echo "Name: ".$value->name.
				" min temperature: ".$value->climateData->minTemperature."C".
				" max temperature: ".$value->climateData->maxTemperature."C".PHP_EOL;
			}
		}
	}
	
	public function getBest(ITripAdvisor $advisor)
	{
		
		$best;
		$bestCityKey;
		foreach ($this->cities as $key=>$value){
			$rate = $advisor->rate($value);
			if(!isset($best) || $best < $rate){
				$bestCityKey = $key;
				$best = $rate;
			}
		}
		$bestCity = $this->cities[$bestCityKey];
		return "Name: ".$bestCity->name." rate-".$best.PHP_EOL;
	}
}