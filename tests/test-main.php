<?php

namespace Tests;

use Main;
use PHPUnit\Framework\TestCase;

require_once 'src/main.php';
require_once 'src/command/commands/text-command.php';
require_once 'src/command/commands/underline-command.php';
require_once 'src/command/commands/italic-command.php';
require_once 'src/command/commands/bold-command.php';
require_once 'src/command/command-list.php';

class MainTest extends TestCase
{
	public function test(){
		$main =  new Main();
		$result = $main->run();
		$this->assertTrue($result);
	}
}

