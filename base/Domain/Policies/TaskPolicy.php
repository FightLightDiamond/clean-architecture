<?php


namespace CleanArchitecture\Task\Domain\Policies;


use CleanArchitecture\Task\Domain\Entities\Task;
use CleanArchitecture\Task\Domain\Entities\User;

class TaskPolicy
{
	public function execute(Task $task, User $user)
	{
		 if($task->getUser()->getId() !== $user->getId()) {
		 	throw new \Exception('Task is not yours', 403);
		 }
	}
}