<?php

namespace Anner\TestPhpDiTypes;

use DateTimeImmutable;
use Pimple\Container as PimpleContainer;

/** @psalm-suppress UnusedClass */
final class AbstractApiControllerProvider
{
	public function __construct(
		private ContainerWrapper $containerWrapper,
	) {
	}


	public function works(): DateTimeImmutable
	{
		$container = $this->containerWrapper->getDI();
		$testService = $container->get(DateTimeImmutable::class);
		return $testService;
	}


	public function stillWorks(): DateTimeImmutable
	{
		$cdc = new ContainerWrapper(new PimpleContainer());
		$container = $cdc->getDI();
		$testService = $container->get(DateTimeImmutable::class);
		return $testService;
	}

	public function doesntwork(): DateTimeImmutable
	{
		$cdc = new ContainerWrapper($this->containerWrapper->getPimple());
		$container = $cdc->getDI();
		$testService = $container->get(DateTimeImmutable::class);
		return $testService;
	}
}
