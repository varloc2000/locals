<?php

namespace Locals\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Locals\AppBundle\Entity\Rent;

class LoadRentData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 20; $i++) {
            $rent = new Rent();
            $rent->setName('Квартира в центре ' . $i);
            $rent->setDescription('Просторная минская квартира с синим потолком и красными стенами...' . $i);
            $rent->setUser($this->getReference('user_' . (0 == ($i % 2) ? $i / 2 : ($i > 10 ? $i - 10 : $i ))));
            
            $this->addReference('rent_' . $i, $rent);
            
            $manager->persist($rent);
        }
        
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}