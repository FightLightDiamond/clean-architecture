<?php


namespace CleanPhp\Invoicer\Domain\Entity;

use Doctrine\ORM\Mapping AS ORM;
use CleanPhp\Invoicer\Domain\Entity\Order;
/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class Invoice extends AbstractEntity
{
	/**
	 * @ORM\Column(type="object")
	 */
	protected $order;
	/**
	 * @ORM\Column(type="string")
	 */
	protected $invoiceDate;
	/**
	 * @ORM\Column(type="float")
	 */
	protected $total;

	public function getOrder()
	{
		return $this->order;
	}

	public function setOrder(Order $order)
	{
		$this->order = $order;
		return $this;
	}

	public function getInvoiceDate()
	{
		return $this->invoiceDate;
	}

	public function setInvoiceDate(\DateTime $invoiceDate)
	{
		$this->invoiceDate = $invoiceDate;
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