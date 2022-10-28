<?php

require_once __DIR__ . '/output-interface.php';

class output implements OutputInterface
{

	private $outputArray = [];

	public function add($string)
	{
		$this->outputArray[] = $string;
	}

	public function remove($string)
	{
		if (($key = array_search($string, $this->outputArray)) !== false) {
			unset($this->outputArray[$key]);
		}
	}

	public function print()
	{
		var_dump($this->outputArray);
	}
}