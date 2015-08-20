<?php

require ('Standardize.php');

class StandardizeTest extends PHPUnit_Framework_TestCase
{
	
	public function testColor()
	{

		$standardize = new Standardize;
		$this->assertEquals('white', $standardize->color('Pearl White'));
		$this->assertEquals('white', $standardize->color('Fresh Powder'));
		$this->assertEquals('white', $standardize->color('Bright White'));
		$this->assertEquals('red', $standardize->color('Red'));
		$this->assertEquals('red', $standardize->color('RED'));
		$this->assertEquals('tan', $standardize->color('Beige'));
		$this->assertEquals('brown', $standardize->color('Metalic Gold'));
		$this->assertEquals('gray', $standardize->color('Carbide Gray'));

	}

}