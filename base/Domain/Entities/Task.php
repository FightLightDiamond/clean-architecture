<?php


namespace CleanArchitecture\Task\Domain\Entities;


class Task
{
	protected $name;
	protected $user;
	protected $status;
	protected $startTime;
	protected $endTime;

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getUser()
	{
		return $this->user;
	}

	public function setUser(User $user)
	{
		$this->user = $user;
	}

	public function getStatus()
	{
		return $this->status;
	}

	public function setStatus($status)
	{
		$this->status = $status;
	}

	public function getStartTime()
	{
		return $this->startTime;
	}

	public function setStartTime($startTime)
	{
		$this->startTime = $startTime;
	}

	public function getEndTime()
	{
		return $this->endTime;
	}

	public function setEndTime($endTime)
	{
		$this->endTime = $endTime;
	}
}