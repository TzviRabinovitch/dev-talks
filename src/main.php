<?php

require_once __DIR__ . "/common/output.php";
require_once __DIR__ . "/command/command-factory.php";
require_once __DIR__ . "/command/command-type.php";
require_once __DIR__ . "/command/Command-stack.php";

class Main{

	public function run(){

		$command_stack =  new CommandStack();
		$output =  new output();
		$command_factory =  new CommandFactory($output);

		try {
			$command_stack->execute($command_factory->get_command(CommandType::TEXT , 'line 1'));
			$command_stack->execute($command_factory->get_command(CommandType::ITALIC , 'line 2'));
			$command_stack->execute($command_factory->get_command(CommandType::BOLD , 'line 3'));
			$command_stack->execute($command_factory->get_command(CommandType::TEXT , 'line 4'));
			$command_stack->execute($command_factory->get_command(CommandType::UNDERLINE , 'line 5'));
		}catch (Exception $e){
			echo "Exception " . $e;
		}

		$output->print();

		$command_stack->undo();

		$output->print();
		return true;

	}
}


