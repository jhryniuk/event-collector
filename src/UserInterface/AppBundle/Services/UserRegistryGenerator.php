<?php

namespace App\UserInterface\AppBundle\Services;

use Doctrine\ORM\EntityManager;

class UserRegistryGenerator
{
    protected $em;

    /**
     * UserRegistry constructor.
     * @param EntityManager $entityManager
     * @param UserDataMapper $userDataMapper
     */
    public function __construct(EntityManager $entityManager, UserDataMapper $userDataMapper)
    {
        $this->em = $entityManager;

        $users = $this->em->getRepository('AppBundle:User')
            ->findAll();

        foreach ($users as $user) {
            $userDataMapper->insertUserToRegistry($user);
            $events = $user->getEvents();

            foreach ($events as $event) {
                $userDataMapper->insertEventToRegistry($event, $user->getId());
            }
        }
    }
}
