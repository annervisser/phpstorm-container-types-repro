<?php

declare(strict_types=1);


namespace Anner\TestPhpDiTypes;

use Pimple\Container as PimpleContainer;
use Psr\Container\ContainerInterface;

readonly class ContainerWrapper
{
	public function __construct(private PimpleContainer $pimpleContainer)
	{
	}

	public function getDI(): ContainerInterface
	{
		/** @var ContainerInterface */
		return $this->pimpleContainer['php-di-container'];
	}

	public function getPimple(): PimpleContainer
	{
		return $this->pimpleContainer;
	}
}
