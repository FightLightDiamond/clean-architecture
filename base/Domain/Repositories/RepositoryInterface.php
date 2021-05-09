<?php


namespace CleanArchitecture\Task\Domain\Repositories;


use CleanArchitecture\Task\Domain\Entities\Task;

interface RepositoryInterface
{
	public function all();
	public function find($id);
	public function delete($id);
}