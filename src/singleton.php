<?php

class Singleton
{
	private static $instance;

	private function __construct() {}

	public static function getInstance(): self
	{
		if (!isset(self::$instance)) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}