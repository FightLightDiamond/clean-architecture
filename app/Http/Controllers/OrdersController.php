<?php


namespace App\Http\Controllers;


use CleanPhp\Invoicer\Domain\Entity\Order;
use CleanPhp\Invoicer\Domain\Repository\CustomerRepositoryInterface;
use CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
	protected $orderRepository;
	protected $customerRepository;


	public function __construct(
		OrderRepositoryInterface $orderRepository,
		CustomerRepositoryInterface $customerRepository
	)
	{
		$this->orderRepository = $orderRepository;
		$this->customerRepository = $customerRepository;
	}

	public function indexAction()
	{
		$orders = [];
		$orders = $this->orderRepository->getAll();
		return response()->json($orders);
	}

	public function viewAction($id)
	{
		$order = $this->orderRepository->getById($id);
		if (!$order) {
			return [];
		}
		return response()->json($order);
	}

	public function newAction(Request $request)
	{
		$order = new Order();
		$order->setCustomer(1);
		$order->setOrderNumber(1);
		$order->setDescription(2);
		$order->setTotal(2);

		$this->orderRepository
			->begin()
			->persist($order)
			->commit();

		return response()->json($order);
	}
}