<?php

namespace Locals\AppBundle\Cdn\Common;

interface ContainerAdapterInterface
{
	const DEFAULT_CONTAINER = 'content';
	
	public function getName();
}