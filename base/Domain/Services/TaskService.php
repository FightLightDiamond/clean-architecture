<?php


namespace CleanArchitecture\Task\Domain\Services;


use CleanArchitecture\Task\Domain\Entities\Task;
use CleanArchitecture\Task\Domain\Entities\User;
use CleanArchitecture\Task\Domain\Factories\TaskFactory;
use CleanArchitecture\Task\Domain\Policies\TaskPolicy;
use CleanArchitecture\Task\Domain\Repositories\TaskRepositoryInterface;

/**
 * Class TaskService
 * @package CleanArchitecture\Task\Domain\Services
 */
class TaskService
{
	/**
	 * @var TaskRepositoryInterface
	 */
	private $taskRepository;
	/**
	 * @var TaskFactory
	 */
	private $taskFactory;
	/**
	 * @var TaskPolicy
	 */
	private $taskPolicy;

	/**
	 * TaskService constructor.
	 * @param TaskRepositoryInterface $taskRepository
	 * @param TaskFactory $taskFactory
	 * @param TaskPolicy $taskPolicy
	 */
	public function __construct(
		TaskRepositoryInterface $taskRepository,
		TaskFactory $taskFactory,
		TaskPolicy $taskPolicy
	)
	{
		$this->taskRepository = $taskRepository;
		$this->taskFactory = $taskFactory;
		$this->taskPolicy = $taskPolicy;
	}

	public function getAll()
	{
		return $this->taskRepository->all();
	}

	/**
	 * @param User $user
	 * @param Task $taskReq
	 * @return mixed
	 */
	public function create(User $user, Task $taskReq)
	{
		$taskFactory = $this->taskFactory->create($user);

		$taskFactory->setName($taskReq->getName());
		$taskFactory->setStartTime($taskReq->getStartTime());
		$taskFactory->setEndTime($taskReq->getEndTime());
		$taskFactory->setStatus($taskReq->getStatus());

		return $this->taskRepository->store($taskFactory);
	}

	/**
	 * @param $id
	 * @param User $user
	 * @return mixed
	 * @throws \Exception
	 */
	public function find(int $id, User $user)
	{
		$task = $this->taskRepository->find($id);
		$this->taskPolicy->execute($task, $user);
		return $task;
	}

	/**
	 * @param $id
	 * @param Task $taskReq
	 * @param User $user
	 * @return mixed
	 * @throws \Exception
	 */
	public function update(int $id, Task $taskReq, User $user)
	{
		$task = $this->taskRepository->find($id);
		$this->taskPolicy->execute($task, $user);
		return $this->taskRepository->update($id, $taskReq);
	}

	/**
	 * @param $id
	 * @param User $user
	 * @return mixed
	 * @throws \Exception
	 */
	public function destroy(int $id, User $user)
	{
		$task = $this->taskRepository->find($id);
		$this->taskPolicy->execute($task, $user);
		return $this->taskRepository->destroy($id);
	}
}