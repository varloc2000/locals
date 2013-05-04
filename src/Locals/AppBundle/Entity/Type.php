<?php

namespace Locals\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use Locals\AppBundle\Entity\Rent;

/**
 * @author varloc2000
 * 
 * @ORM\Table(name="rent_type")
 * @ORM\Entity(repositoryClass="Locals\AppBundle\Repository\TypeRepository")
 */
class Type
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="name", type="string")
     * @Assert\NotBlank(message="rent_name_required")
     */
    private $name;
    
    /**
     * @ORM\OneToOne(targetEntity="Locals\AppBundle\Entity\Rent", inversedBy="type")
     */
    private $rent;
    
    
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Rent
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}