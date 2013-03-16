<?php

namespace Locals\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use Locals\AppBundle\Entity\Rent;

/**
 * @author varloc2000
 * 
 * @ORM\Table(name="rent_photo")
 * @ORM\Entity(repositoryClass="Locals\AppBundle\Repository\RentPhotoRepository")
 */
class RentPhoto
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @Assert\NotBlank
     * @ORM\ManyToOne(targetEntity="Locals\AppBundle\Entity\Rent")
     */
    private $rent;
    
    /**
     * @ORM\Column(name="name", type="string")
     * @Assert\NotBlank(message="photo_name_required")
     */
    private $name;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Photo
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

    /**
     * Set rent
     *
     * @param \Locals\AppBundle\Entity\Rent $rent
     * @return RentPhoto
     */
    public function setRent(Rent $rent = null)
    {
        $this->rent = $rent;
    
        return $this;
    }

    /**
     * Get rent
     *
     * @return \Locals\AppBundle\Entity\Rent 
     */
    public function getRent()
    {
        return $this->rent;
    }
}