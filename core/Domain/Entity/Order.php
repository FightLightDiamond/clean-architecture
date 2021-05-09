<?php


namespace CleanPhp\Invoicer\Domain\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="scientist")
 */
class Order extends AbstractEntity
{
	/**
	 * @ORM\Column(type="object")
	 */
	protected $customer;
	/**
	 * @ORM\Column(type="string")
	 */
	protected $orderNumber;
	/**
	 * @ORM\Column(type="string")
	 */
	protected $description;
	/**
	 * @ORM\Column(type="string")
	 */
	protected $total;

	public function getCustomer()
	{
		return $this->customer;
	}

	public function setCustomer($customer)
	{
		$this->customer = $customer;
		return $this;
	}

	public function getOrderNumber()
	{
		return $this->orderNumber;
	}

	public function setOrderNumber($orderNumber)
	{
		$this->orderNumber = $orderNumber;
		return $this;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		$this->description = $description;
		return $this;
	}

	public function getTotal()
	{
		return $this->total;
	}

	public function setTotal($total)
	{
		$this->total = $total;
		return $this;
	}
}