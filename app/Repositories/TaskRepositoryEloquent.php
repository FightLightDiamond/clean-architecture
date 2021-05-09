<?php

namespace App\Repositories;

use CleanArchitecture\Task\Domain\Repositories\TaskRepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Task;
use App\Validators\TaskValidator;

/**
 * Class TaskRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TaskRepositoryEloquent extends BaseRepository implements TaskRepositoryInterface
{
	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return Task::class;
	}

	public function store(\CleanArchitecture\Task\Domain\Entities\Task $task)
	{
		return $this->create([
			'name' => $task->getName(),
			'user_id' => $task->getUser()->getId() ?? 1,
			'start_time' => $task->getStartTime(),
			'end_time' => $task->getEndTime(),
			'status' => $task->getStatus(),
		]);
	}

	public function modify($id, \CleanArchitecture\Task\Domain\Entities\Task $task)
	{
		return $this->update($id, [
			'name' => $task->getName(),
			'user_id' => $task->getUser()->getId() ?? 1,
			'start_time' => $task->getStartTime(),
			'end_time' => $task->getEndTime(),
			'status' => $task->getStatus(),
		]);
	}
}
