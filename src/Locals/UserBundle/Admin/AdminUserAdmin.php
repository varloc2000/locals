<?php

namespace Locals\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;

/**
 * @author varloc2000
 */
class AdminUserAdmin extends UserAdmin
{
    /**
     * Configure class for list of Administrators
     */
    public function configure()
    {
        $this->setBaseRoutePattern('/admin/user');
        $this->setBaseRouteName('admin_user');
        $this->setClassnameLabel('admin-user');
    }
}