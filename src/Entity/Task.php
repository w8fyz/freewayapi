<?php
namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
class Task
{
    private ?int $id = null;

    #[ORM\Column]
    public string $name = '';

    #[ORM\Column]
    public string $description = '';

    #[ORM\Column]
    public bool $isDone = false;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}