<?php

class Calculator {
	public function add($string){
		$data = preg_split("/[,.:*;]+/", $string);
		$newData = array_sum($data);
		if( in_array("-", $data) ) throw new Exception('Error');
		if(count($data) > 3) throw new InvalidArgumentException('Error');
		return $newData;
	}
}