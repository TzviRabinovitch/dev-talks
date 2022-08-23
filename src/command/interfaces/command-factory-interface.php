<?php

interface CommandFactoryInterface
{
	public function get_command($command_type, string $string);
}