<?php


namespace App\Http\Controllers;


use CleanPhp\Invoicer\Domain\Entity\User;
use CleanPhp\Invoicer\Domain\Repository\CustomerRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomersController extends Controller
{
	private $customerRepository;
	/**
	 * @var CustomerInputFilter
	 */
	private $inputFilter;

	/**
	 * CustomersController constructor.
	 * @param CustomerRepositoryInterface $customerRepository
	 * @param CustomerInputFilter $inputFilter
	 */
	public function __construct(
		CustomerRepositoryInterface $customerRepository,
		CustomerInputFilter $inputFilter
	)
	{
		$this->inputFilter = $inputFilter;
		$this->customerRepository = $customerRepository;
	}

	public function indexAction()
	{
		$customers = $this->customerRepository->getAll();
		return view('customers/index', ['customers' => $customers]);
	}

	public function newOrEditAction(Request $request, $id = '')
	{
		$viewModel = [];
		$customer = $id ? $this->customerRepository->getById($id) : new User();
		if ($request->getMethod() == 'POST') {
			$this->inputFilter->setData($request->request->all());
			if ($this->inputFilter->isValid()) {
				$this->hydrator->hydrate(
					$this->inputFilter->getValues(),
					$customer
				);
				$this->customerRepository
					->begin()
					->persist($customer)
					->commit();
				Session::flash('success', 'Customer Saved');
				return new RedirectResponse('/customers/edit/' . $customer->getId()
				);
			} else {
				$this->hydrator->hydrate(
					$request->request->all(),
					$customer
				);
				$viewModel['error'] = $this->inputFilter->getMessages();
			}
		}
		$viewModel['customer'] = $customer;
		return view('customers/new-or-edit', $viewModel);
	}
}