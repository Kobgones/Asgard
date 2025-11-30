<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use App\Repository\CondominiumRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: CondominiumRepository::class)]
#[ApiResource(
    uriTemplate: '/condominiums',
    operations: [
        new Get(uriTemplate: '/condominium/{id}'),
        new GetCollection(),
        new Post(uriTemplate: '/condominium'),
        new Put(uriTemplate: '/condominium/{id}'),
        new Delete(uriTemplate: '/condominium/{id}'),
    ],
    normalizationContext: ['groups' => ['condominium:read']],
    denormalizationContext: ['groups' => ['condominium:write']],
    paginationItemsPerPage: 20,
    paginationMaximumItemsPerPage: 100
)]
class Condominium
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['condominium:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['condominium:read', 'condominium:write'])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups(['condominium:read', 'condominium:write'])]
    private ?string $address = null;

    #[ORM\Column(length: 12)]
    #[Groups(['condominium:read', 'condominium:write'])]
    private ?string $postalCode = null;

    #[ORM\Column(length: 255)]
    #[Groups(['condominium:read', 'condominium:write'])]
    private ?string $city = null;

    #[ORM\Column]
    #[Groups(['condominium:read', 'condominium:write'])]
    private ?int $numberOfMainUnits = null;

    #[ORM\Column]
    #[Groups(['condominium:read', 'condominium:write'])]
    private ?int $numberOfSecondaryUnits = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['condominium:read', 'condominium:write'])]
    private ?int $yearOfConstruction = null;

    #[ORM\OneToMany(mappedBy: 'condominium', targetEntity: Unit::class, orphanRemoval: true)]
    #[Groups(['condominium:read'])]
    private Collection $units;

    public function __construct()
    {
        $this->units = new ArrayCollection();
    }

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

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

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

    /**
     * @return Collection<int, Unit>
     */
    public function getUnits(): Collection
    {
        return $this->units;
    }

    public function addUnit(Unit $unit): static
    {
        if (!$this->units->contains($unit)) {
            $this->units->add($unit);
            $unit->setCondominium($this);
        }

        return $this;
    }

    public function removeUnit(Unit $unit): static
    {
        if ($this->units->removeElement($unit)) {
            // set the owning side to null (unless already changed)
            if ($unit->getCondominium() === $this) {
                $unit->setCondominium(null);
            }
        }

        return $this;
    }
}
