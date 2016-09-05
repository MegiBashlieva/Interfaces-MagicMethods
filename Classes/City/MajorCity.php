<?php
namespace Classes\City;

class MajorCity extends City
{
	private $members;
	
	public function __construct($name, $countryKey, $developmentIndex,
							    $climateData,$members)
	{
		parent::__construct($name, $countryKey, $developmentIndex, $climateData);
		
		$this->members = $members;
	}
	
	public function __toString()
	{
		return parent::__toString()."Members: ".$this->members.PHP_EOL;
	}
}