<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\JobOfferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobOfferRepository::class)]
#[ApiResource]
class JobOffer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: Skill::class, inversedBy: 'jobOffers')]
    private Collection $requiredSkills;

    #[ORM\ManyToMany(targetEntity: User::class)]
    private Collection $matchingUsers;

    public function __construct()
    {
        $this->requiredSkills = new ArrayCollection();
        $this->matchingUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Skill>
     */
    public function getRequiredSkills(): Collection
    {
        return $this->requiredSkills;
    }

    public function addRequiredSkill(Skill $requiredSkill): static
    {
        if (!$this->requiredSkills->contains($requiredSkill)) {
            $this->requiredSkills->add($requiredSkill);
        }

        return $this;
    }

    public function removeRequiredSkill(Skill $requiredSkill): static
    {
        $this->requiredSkills->removeElement($requiredSkill);

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getMatchingUsers(): Collection
    {
        return $this->matchingUsers;
    }

    public function addMatchingUser(User $matchingUser): static
    {
        if (!$this->matchingUsers->contains($matchingUser)) {
            $this->matchingUsers->add($matchingUser);
        }

        return $this;
    }

    public function removeMatchingUser(User $matchingUser): static
    {
        $this->matchingUsers->removeElement($matchingUser);

        return $this;
    }
}
