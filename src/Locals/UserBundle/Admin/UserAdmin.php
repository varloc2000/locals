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

    /**
     * See Sonata\AdminBundle\Admin
     * @param string $classnameLabel 
     */
    public function setClassnameLabel($classnameLabel)
    {
        $this->classnameLabel = $classnameLabel;
    }
    
    /**
     * See Sonata\AdminBundle\Admin
     * @param string $baseRoutePattern 
     */
    public function setBaseRoutePattern($baseRoutePattern)
    {
        $this->baseRoutePattern = $baseRoutePattern;
    }
    
    /**
     * See Sonata\AdminBundle\Admin
     * @param string $baseRouteName
     */
    public function setBaseRouteName($baseRouteName)
    {
        $this->baseRouteName = $baseRouteName;
    }
}