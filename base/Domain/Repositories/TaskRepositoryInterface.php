<?php


namespace CleanArchitecture\Task\Domain\Repositories;


use CleanArchitecture\Task\Domain\Entities\Task;

interface TaskRepositoryInterface extends RepositoryInterface
{
	public function store(Task $task);
	public function modify($id, Task $task);
}