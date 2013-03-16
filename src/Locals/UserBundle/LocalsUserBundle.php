<?php

namespace Locals\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class LocalsUserBundle extends Bundle
{
    /**
     * {@inheritDoc}
     */
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
