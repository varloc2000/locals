<?php

namespace Locals\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Locals\AppBundle\Entity\Type;

class LoadTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $type = new Type();
        $type->setName('Квартира');
        $this->addReference('type_1', $type);
        $manager->persist($type);
        
        $type = new Type();
        $type->setName('Комната');
        $this->addReference('type_2', $type);
        $manager->persist($type);
        
        $type = new Type();
        $type->setName('Дом');
        $this->addReference('type_3', $type);
        $manager->persist($type);
        
        $type = new Type();
        $type->setName('Комната в общежитии');
        $this->addReference('type_4', $type);
        $manager->persist($type);
        
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}