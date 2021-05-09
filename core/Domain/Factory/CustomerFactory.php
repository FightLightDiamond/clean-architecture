<?php


namespace CleanPhp\Invoicer\Domain\Factory;


use CleanPhp\Invoicer\Domain\Entity\User;

class CustomerFactory
{
	protected $managerRepository;

	public function __construct(AccountManagerRepositoryInterface $repo)
	{
		$this->managerRepository = $repo;
	}

	public function create()
	{
		$customer = new User();
		$customer->setAccountManager(
			$this->managerRepository->getNextAvailable()
		);
	}
}