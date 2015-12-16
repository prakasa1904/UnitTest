<?php

use \Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase {
	
	public function testEmptyString(){
		$calc = new Calculator();

		$result = $calc->add("");

		$this->assertEquals(0, $result);
	}

	public function testSingleNumber(){
		$calc = new Calculator();

		$result = $calc->add("1");

		$this->assertEquals(1, $result);
	}

	public function testTwoNumbers(){
		$calc = new Calculator();

		$result = $calc->add("1, 2");

		$this->assertEquals(3, $result);
	}

	public function testThreeNumbers(){
		$calc = new Calculator();

		$result = $calc->add("1,2,3");

		$this->assertEquals(6, $result);
	}

	/** 
	* @expectedException InvalidArgumentException
	*/
	public function testFourNumbers(){
		$calc = new Calculator();

		$result = $calc->add("1,2,3,4");
	}

	public function testIgnoreNewline(){
		$calc = new Calculator();

		$result = $calc->add("1,\n2,\n3");

		$this->assertEquals(6, $result);
	}

	public function testOtherDelims(){
		$calc = new Calculator();

		$result = $calc->add("1:2*3");

		$this->assertEquals(6, $result);

		$result = $calc->add("1;2.3");

		$this->assertEquals(6, $result);
	}

	/** 
	* @expectedException2 Exception
	*/
	public function testNegativeNotAllow(){
		$calc = new Calculator();

		$result = $calc->add("-1:2*-3");
	}

	public function testMultipleDelims(){
		$calc = new Calculator();

		$result = $calc->add("1;:2*.3");

		$this->assertEquals(6, $result);
	}
}