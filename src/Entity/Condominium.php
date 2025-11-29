<?php

namespace App\Entity;

use App\Repository\CondominiumRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CondominiumRepository::class)]
class Condominium
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 12)]
    private ?string $postalCode = null;

    #[ORM\Column]
    private ?int $numberOfMainUnits = null;

    #[ORM\Column]
    private ?int $numberOfSecondaryUnits = null;

    #[ORM\Column(nullable: true)]
    private ?int $yearOfConstruction = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): static
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getNumberOfMainUnits(): ?int
    {
        return $this->numberOfMainUnits;
    }

    public function setNumberOfMainUnits(int $numberOfMainUnits): static
    {
        $this->numberOfMainUnits = $numberOfMainUnits;

        return $this;
    }

    public function getNumberOfSecondaryUnits(): ?int
    {
        return $this->numberOfSecondaryUnits;
    }

    public function setNumberOfSecondaryUnits(int $numberOfSecondaryUnits): static
    {
        $this->numberOfSecondaryUnits = $numberOfSecondaryUnits;

        return $this;
    }

    public function getYearOfConstruction(): ?int
    {
        return $this->yearOfConstruction;
    }

    public function setYearOfConstruction(?int $yearOfConstruction): static
    {
        $this->yearOfConstruction = $yearOfConstruction;

        return $this;
    }
}
