<?php

namespace Locals\AppBundle\Cdn\Adapter;

use Locals\AppBundle\Cdn\Common\ContainerAdapterInterface;

class ContainerAdapter implements ContainerAdapterInterface
{
	const CONTAINER_NAME = 'content';
	
	public function getName() 
	{
		return self::CONTAINER_NAME;
	}
}