<?php

namespace Locals\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

use FOS\UserBundle\Entity\User;

/**
 * @author varloc2000
 * 
 * @ORM\Table(name="rent")
 * @ORM\Entity(repositoryClass="Locals\AppBundle\Repository\RentRepository")
 */
class Rent
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
     * ORM\OneToOne(targetEntity="Locals\AppBundle\Entity\Type")
     * @Assert\NotBlank
     */
    private $type;
    
    /**
     * @ORM\Column(name="rooms", type="integer")
     */
    private $rooms;
    
    /**
     * @ORM\Column(name="area", type="integer")
     * @Assert\NotBlank(message="rent_area_required")
     */
    private $area;
    
    /**
     * @ORM\Column(name="description", type="string")
     * @Assert\NotBlank(message="rent_description_required")
     */
    private $description;
    
    /**
     * @ORM\ManyToOne(targetEntity="FOS\UserBundle\Entity\User")
     */
    private $user;
    
    /**
     * @Assert\NotBlank
     * ORM\OneToMany(targetEntity="Locals\AppBundle\Entity\Photo")
     */
    private $photos = array();
    
    /**
     * @ORM\Column(name="price", type="float")
     * @Assert\NotBlank(message="rent_description_required")
     */
    private $price;
    
    public function __construct()
    {
        $this->photos = new ArrayCollection();
    }
    
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

    /**
     * Set rooms
     *
     * @param integer $rooms
     * @return Rent
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
    
        return $this;
    }

    /**
     * Get rooms
     *
     * @return integer 
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Set area
     *
     * @param integer $area
     * @return Rent
     */
    public function setArea($area)
    {
        $this->area = $area;
    
        return $this;
    }

    /**
     * Get area
     *
     * @return integer 
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Rent
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Rent
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set user
     *
     * @param \FOS\UserBundle\Entity\User $user
     * @return Rent
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \FOS\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}