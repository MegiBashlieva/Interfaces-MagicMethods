<?php
namespace Classes\ClimateInfo;

class ClimateInfo
{
	private $minTemperature;
	private $maxTemperature;
	
	public function __construct($minTemperature,$maxTemperature)
	{
		$this->minTemperature = $minTemperature;
		$this->maxTemperature = $maxTemperature;
	}
	
	public function __get($property)
	{
	  if (property_exists($this, $property)) {
	    return $this->$property;
	  }
	}
	
	
	
	public function __toString()
	{
		return "min temperature: ".$this->minTemperature." max temperature: ".
		$this->maxTemperature;
	}
}