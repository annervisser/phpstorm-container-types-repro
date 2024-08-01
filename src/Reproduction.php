<?php

namespace Anner\TestPhpDiTypes;

use Pimple\Container as PimpleContainer;

/** @psalm-suppress UnusedClass */
final class Reproduction
{
	public function __construct(
		private ContainerWrapper $containerWrapper,
	) {
	}


	public function works(): string
	{
		$container = $this->containerWrapper->getDI();
		$service = $container->get(ExampleService::class);
		return $service->method1();
	}


	public function stillWorks(): string
	{
		$cdc = new ContainerWrapper(new PimpleContainer());
		$container = $cdc->getDI();
		$service = $container->get(ExampleService::class);
		return $service->method1();
	}

	public function doesntWork(): string
	{
		$cdc = new ContainerWrapper($this->containerWrapper->getPimple());
		$container = $cdc->getDI();
		$service = $container->get(ExampleService::class);
		return $service->method1();
	}
}
