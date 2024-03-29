<?php


namespace CleanPhp\Invoicer\Persistence\Doctrine\Repository;


use CleanPhp\Invoicer\Domain\Entity\AbstractEntity;
use CleanPhp\Invoicer\Domain\Repository\RepositoryInterface;
use Doctrine\ORM\EntityManager;

abstract class AbstractDoctrineRepository implements RepositoryInterface
{
	protected $entityManager;
	protected $entityClass;

	public function __construct(EntityManager $em)
	{
		$this->entityManager = $em;
		if (empty($this->entityClass)) {
			throw new \RuntimeException(
				'entityClass not specified for ' . __CLASS__
			);
		}
	}

	public function getById($id)
	{
		return $this->entityManager->find($this->entityClass, $id);
	}

	public function getAll()
	{
		return $this->entityManager->getRepository($this->entityClass)
			->findAll();
	}

	public function getBy(
		$conditions = [],
		$order = [],
		$limit = null,
		$offset = null
	)
	{
		$repository = $this->entityManager->getRepository(
			$this->entityClass
		);
		$results = $repository->findBy(
			$conditions,
			$order,
			$limit,
			$offset
		);
		return $results;
	}

	public function persist(AbstractEntity $entity)
	{
		$this->entityManager->persist($entity);
		return $this;
	}

	public function begin()
	{
		$this->entityManager->beginTransaction();
		return $this;
	}

	public function commit()
	{
		$this->entityManager->flush();
		$this->entityManager->commit();
		return $this;
	}
}