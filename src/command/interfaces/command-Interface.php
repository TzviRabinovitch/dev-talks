<?php

interface CommandInterface
{
	public function run();

	public function undo();
}