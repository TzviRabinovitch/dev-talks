<?php
require_once __DIR__ . "/interfaces/command-factory-interface.php";

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
			case CommandType::BOLD :
				return new BoldCommand($string, $this->output);
			case CommandType::ITALIC :
				return new ItalicCommand($string , $this->output);
			case CommandType::UNDERLINE :
				return new UnderlineCommand($string , $this->output);
			default : throw new Exception("NOt supported type " . $command_type);
		}

		//return new $command_type($string , $this->output);
	}
}
