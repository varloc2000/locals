<?php

namespace Locals\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;

/**
 * @author varloc2000
 */
class UserAdmin extends Admin
{
    /**
     * Default Datagrid values
     *
     * @var array
     */
    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'DESC',
        '_sort_by' => 'username'
    );
    
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->add('username')
            ->add('emailCanonical')
            ->add('roles')
        ;
    }
}