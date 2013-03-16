<?php

namespace Locals\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as FosUser;
use Doctrine\Common\Collections\Collection;

use Locals\AppBundle\Entity\Rent;

/**
 * @author varloc2000
 * 
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Locals\UserBundle\Repository\UserRepository")
 */
class User extends FosUser
{
    const ROLE_USER = 'ROLE_USER';
    const ROLE_COMPANY = 'ROLE_COMPANY';
    const ROLE_ADMIN = 'ROLE_ADMIN';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * TODO: Company implementation
     * ORM\OneToOne(targetEntity="Locals\AppBundle\Entity\Company", mappedBy="user")
     */
    protected $company;
    
    /**
     * @ORM\OneToOne(targetEntity="Locals\AppBundle\Entity\Rent", mappedBy="user")
     */
    protected $rents;


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }
}
