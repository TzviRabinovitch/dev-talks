<?php

require_once "src/command/interfaces/command-Interface.php";

class TextCommand implements CommandInterface
{

	private $text;
	private $output;

	public function __construct($text, $output)
	{
		$this->text = $text;
		$this->output = $output;
	}

	public function run()
	{
		$this->output->add($this->text);
	}

	public function undo()
	{
		$this->output->remove($this->text);
	}
}