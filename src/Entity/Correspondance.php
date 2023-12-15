<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CorrespondanceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CorrespondanceRepository::class)]
#[ApiResource]
class Correspondance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $matchLevel = null;

    #[ORM\ManyToOne(inversedBy: 'matches')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatchLevel(): ?int
    {
        return $this->matchLevel;
    }

    public function setMatchLevel(int $matchLevel): static
    {
        $this->matchLevel = $matchLevel;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
