<?php

namespace App\EntityListener;

use App\Entity\Project;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsEntityListener(event: Events::prePersist, entity: User::class)]
class UserListener {

    public function __construct(private Security $security, private UserPasswordHasherInterface $passwordHasher) {
    }

    public function prePersist(User $user, LifecycleEventArgs $event) {
        $user->setRoles(['ROLE_USER']);
        $hash = $this->passwordHasher->hashPassword($user, $user->getPassword());
        $user->setPassword($hash);
    }
}