<?php

namespace Locals\AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
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
}