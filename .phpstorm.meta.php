<?php

namespace PHPSTORM_META {
	override(
		\Psr\Container\ContainerInterface::get(0),
		map([
			'' => '$0',
		])
	);
	override(
		\DI\Container::get(0),
		map([
			'' => '$0',
		])
	);
}
