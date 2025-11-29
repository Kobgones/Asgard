<?php

namespace App\Entity;

use App\Repository\UnitRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Enum\UnitType;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UnitRepository::class)]
class Unit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank]
    private int $UnitIdentifier;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private UnitType $type;

    #[ORM\Column(type: 'boolean')]
    #[Assert\NotBlank]
    private bool $isMainUnit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnitIdentifier(): ?int
    {
        return $this->UnitIdentifier;
    }

    public function setUnitIdentifier(int $UnitIdentifier): static
    {
        $this->UnitIdentifier = $UnitIdentifier;

        return $this;
    }

    public function getType(): ?UnitType
    {
        return $this->type;
    }

    public function setType(UnitType $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function isMainUnit(): bool
    {
        return $this->isMainUnit;
    }

    public function setIsMainUnit(bool $isMainUnit): static
    {
        $this->isMainUnit = $isMainUnit;

        return $this;
    }
}
