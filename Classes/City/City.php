<?php
namespace Classes\City;

use Classes\ClimateInfo\ClimateInfo;

class City
{
	protected  $name;
	protected  $countryKey;
	protected  $developmentIndex;
	protected  $climateData;
	
	public function __construct($name, $countryKey, $developmentIndex,
													ClimateInfo $climateData)
	{
		$this->name=$name;
		$this->countryKey = $this->checkCountryKey($countryKey);
		$this->developmentIndex = $this->checkIndex($developmentIndex);
		$this->climateData = $climateData; 
	}
	
	public function __get($property)
	{
		
		if (property_exists($this, $property)) {
			return $this->$property;
		}
	}
	
	public function __set($property, $value)
	{
		if(property == $developmentIndex &&  is_numeric($this->checkIndex($value))){
			$this->$property = $value;
		}else if(property ==$countryKey  && checkCountryKey($value)){
			$this->$property = $value;
		}else if (property_exists($this, $property)) {
			$this->$property = $value;
		}
	}
	
	public function __toString()
	{
		return "Name: ".$this->name.PHP_EOL.
		 	   "Key: ".$this->countryKey.PHP_EOL.
			   "Name: ".$this->name.PHP_EOL.
			   "Develompent index: ".$this->developmentIndex.PHP_EOL.
			   "Climate data: ".$this->climateData->__toString().PHP_EOL;
	}
	
	private function checkIndex($index)
	{
		if($index >= 0 && $index <= 1){
			return $index;
		}
		else{
			 throw new \Exception('Invalid index');
		}
	}
	
	private function checkCountryKey($countryKey)
	{
		$pattern = "@^[A-Z]{3}$@";
		preg_match($pattern, $countryKey,$matches);
		if($matches){
			return $countryKey;
		}else {
			 throw new \Exception('Invalid country key');
		}
	}
}