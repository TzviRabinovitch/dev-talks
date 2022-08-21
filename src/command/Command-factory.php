<?php

require_once "src/command/interfaces/command-factory-interface.php";
class CommandFactory implements CommandFactoryInterface
{


	private $output;

	public function __construct($output)
	{
		$this->output =  $output;
	}

	/**
	 * @throws Exception
	 */
	public function get_command($command_type, string $string)
	{
		switch ($command_type){
			case CommandType::TEXT :
				return new TextCommand($string , $this->output);
				break;
			case CommandType::BOLD :
				return new BoldCommand($string, $this->output);
				break;
			case CommandType::ITALIC :
				return new ItalicCommand($string , $this->output);
				break;
			default : throw new Exception("NOt supported type " . $command_type);
		}
	}
}
