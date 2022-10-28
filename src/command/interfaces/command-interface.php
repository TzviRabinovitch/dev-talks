<?php

interface CommandInterface
{
	public function do();
	public function undo();
}