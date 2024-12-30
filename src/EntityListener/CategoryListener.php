<?php

namespace App\EntityListener;

use App\Entity\Category;
use App\Entity\Project;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;

#[AsEntityListener(event: Events::prePersist, entity: Category::class)]
class CategoryListener {

    public function __construct(private Security $security) {
    }

    public function prePersist(Category $category, LifecycleEventArgs $event) {

    }
}