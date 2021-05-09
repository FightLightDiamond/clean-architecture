<?php

namespace App\Providers;

use App\Repositories\TaskRepositoryEloquent;
use CleanArchitecture\Task\Domain\Repositories\TaskRepositoryInterface;
use CleanPhp\Invoicer\Domain\Repository\CustomerRepositoryInterface;
use CleanPhp\Invoicer\Domain\Repository\InvoiceRepositoryInterface;
use CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface;
use CleanPhp\Invoicer\Persistence\Doctrine\Repository\CustomerRepository;
use CleanPhp\Invoicer\Persistence\Doctrine\Repository\InvoiceRepository;
use CleanPhp\Invoicer\Persistence\Doctrine\Repository\OrderRepository;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(TaskRepositoryInterface::class, TaskRepositoryEloquent::class);

		$this->app->bind(
			CustomerRepositoryInterface::class,
			function ($app) {
				return new CustomerRepository(
					$app['Doctrine\ORM\EntityManagerInterface']
				);
			}
		);

		$this->app->bind(
			OrderRepositoryInterface::class,
			function ($app) {
				return new OrderRepository(
					$app['Doctrine\ORM\EntityManagerInterface']
				);
			}
		);

		$this->app->bind(
			InvoiceRepositoryInterface::class,
			function ($app) {
				return new InvoiceRepository(
					$app['Doctrine\ORM\EntityManagerInterface']
				);
			}
		);
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}
}
