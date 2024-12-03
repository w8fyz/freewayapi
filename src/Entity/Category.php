<?php
namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
class Category
{
    private ?int $id = null;

    #[ORM\Column]
    public Project $project;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}