<?php

namespace Locals\UserBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Locals\UserBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setUsername('admin');
        $admin->setEmail('admin@admin.com');
        $admin->setPlainPassword('beadminiscool');
        $admin->addRole(User::ROLE_ADMIN);
        $admin->setEnabled(true);

        $manager->persist($admin);
        
        for ($i = 1; $i <= 10; $i++) {
            $user = new User();
            $user->setUsername('base_user_' . $i);
            $user->setEmail('base_user_' . $i . '@mail.mail');
            $user->setPlainPassword('123123');
            if ($i < 6) {
                $user->addRole(User::ROLE_USER);
            } else {
                $user->addRole(User::ROLE_COMPANY);
            }
            $user->setEnabled(true);

            $this->addReference('user_' . $i, $user);

            $manager->persist($user);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}
