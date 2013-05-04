<?php

namespace Locals\AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

/**
 * @author varloc2000
 */
class RentAdmin extends Admin
{
    /**
     * Default Datagrid values
     *
     * @var array
     */
    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'DESC',
        '_sort_by' => 'name'
    );
    
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('name')
//            ->add('type')
            ->add('rooms')
            ->add('area')
            ->add('price')
            ->add('user')
        ;
    }
    
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->add('name')
            ->add('type')
            ->add('rooms')
            ->add('area')
            ->add('price')
            ->add('user')
        ;
    }
}