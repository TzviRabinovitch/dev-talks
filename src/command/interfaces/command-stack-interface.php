<?php

interface CommandStackInterface
{
	public function execute(CommandInterface $command);
	public function undo();

}