<?php


namespace CleanPhp\Invoicer\Persistence\Doctrine\Repository;


use CleanPhp\Invoicer\Domain\Repository\CustomerRepositoryInterface;
use Doctrine\ORM\EntityManager;

class CustomerRepository extends AbstractDoctrineRepository implements CustomerRepositoryInterface
{
	protected $entityManager;
	protected $entityClass = 'CleanPhp\Invoicer\Domain\Entity\User';
}