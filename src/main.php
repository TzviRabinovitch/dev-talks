<?php

require_once "common\output.php";
require_once "command\command-factory.php";
require_once "command\command-type.php";
require_once "command\Command-stack-manager.php";

class Main{

	public function run(){

		$command_stack =  new CommandStackManager();
		$output =  new output();
		$command_factory =  new CommandFactory($output);

		try {
			$command_stack->execute($command_factory->get_command(CommandType::TEXT , 'line 1'));
			$command_stack->execute($command_factory->get_command(CommandType::ITALIC , 'line 2'));
			$command_stack->execute($command_factory->get_command(CommandType::BOLD , 'line 3'));
			$command_stack->execute($command_factory->get_command(CommandType::TEXT , 'line 4'));
		}catch (Exception $e){
			echo "Exception " . $e;
		}
		$output->print();
		$command_stack->undo();

		$output->print();
		return true;


//		try {
//			$command_stack->execute(new TextCommand('line 1' , $output));
//			$command_stack->execute(new ItalicCommand('line 2' , $output));
//			$command_stack->execute(new BoldCommand('line 3' , $output));
//			$command_stack->execute(new TextCommand('line 4' , $output));
//		}catch (Exception $e){
//			echo "Exception " . $e;
//		}



	}
}


