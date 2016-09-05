<?php
namespace Interfaces;

use Classes\City\City;

interface ITripAdvisor
{
	
	public function rate(City $city);
}