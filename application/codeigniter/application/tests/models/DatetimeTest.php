<?php

/**
 * @group Model
 */

class DatetimeTest extends CIUnit_TestCase
{

	protected $date;
	protected $date_string;

	public function setUp()
	{
		$this->date_string = '2012-10-11 10:15:30';
		$this->date = new Datetime($this->date_string);
	}

	public function test_format()
	{
		$this->assertEquals($this->date_string, $this->date->format('Y-m-d H:i:s'));
	}

	public function test_greater_than_operator()
	{
		$date_string = '2012-11-11 10:15:30';
		$date_larger = new Datetime($date_string);

		$result = (bool)($date_larger > $this->date);

		$this->assertTrue($result);
	}

	public function test_dates_referece_same_object()
	{
		$date_not_a_copy = $this->date;

		$date_not_a_copy->modify('-2 days');

		$this->assertEquals($this->date, $date_not_a_copy);
	}

	//unfinished test
	public function test_modify()
	{
		$this->date->modify('-2 days');

		//add code to make sure that this worked
	}
}
