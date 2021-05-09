<?php


namespace CleanArchitecture\Task\Domain\Factories;



use CleanArchitecture\Task\Domain\Entities\Task;
use CleanArchitecture\Task\Domain\Entities\User;

class TaskFactory
{
	public function create(User $user)
	{
		$task = new Task();
		$task->setUser($user);
		return $task;
	}
}