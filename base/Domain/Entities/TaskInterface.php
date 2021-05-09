<?php


namespace CleanArchitecture\Task\Domain\Entities;


interface TaskInterface
{
	public function getName();

	public function setName($name);

	public function getUser();

	public function setUser($user);

	public function getStatus();

	public function setStatus($status);

	public function getStartTime();

	public function setStartTime($startTime);

	public function getEndTime();

	public function setEndTime($endTime);
}