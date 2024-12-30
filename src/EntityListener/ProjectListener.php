<?php

namespace App\EntityListener;

use App\Entity\Project;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;

#[AsEntityListener(event: Events::prePersist, entity: Project::class)]
class ProjectListener {

    public function __construct(private Security $security) {
    }

    public function prePersist(Project $project, LifecycleEventArgs $event) {
        $project->setOwner($this->security->getUser());
    }
}