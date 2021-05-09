<?php


namespace CleanPhp\Invoicer\Domain\Entity;

use Doctrine\ORM\Mapping AS ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class Customer extends AbstractEntity
{
	/**
	 * @ORM\Column(type="string")
	 */
	protected $name;
	/**
	 * @ORM\Column(type="string")
	 */
	protected $email;

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}
}