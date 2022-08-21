<?php
final class CommandList
{
	/**
	 * @var CommandInterface[] The users
	 */
	private  $commands;

	/**
	 * The constructor.
	 *
	 * @param CommandInterface ...$commands
	 */
	public function __construct(CommandInterface ...$commands)
	{
		$this->commands = $commands;
	}

	/**
	 * Add user to list.
	 *
	 * @param CommandInterface $command The command
	 *
	 * @return void
	 */
	public function add(CommandInterface $command): void
	{
		$this->commands[] = $command;
	}

	/**
	 * Get all commands.
	 *
	 * @return TextCommand[] The users
	 */
	public function all(): array
	{
		return $this->commands;
	}


	public function pop(): CommandInterface
	{
		return array_pop($this->commands);;
	}
}