<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use App\Repository\UnitRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Enum\UnitType;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UnitRepository::class)]
#[ApiResource(
    uriTemplate: '/units',
    operations: [
        new Get(uriTemplate: '/unit/{id}'),
        new GetCollection(),
        new Post(security: "is_granted('ROLE_ADMIN')"),
        new Put(uriTemplate: '/unit/{id}', security: "is_granted('ROLE_ADMIN')"),
        new Delete(uriTemplate: '/unit/{id}', security: "is_granted('ROLE_ADMIN')"),
    ],
    normalizationContext: ['groups' => ['unit:read']],
    denormalizationContext: ['groups' => ['unit:write']],
)]
class Unit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['unit:read'])]
    private ?int $id = null;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank]
    #[Groups(['unit:read', 'unit:write'])]
    private int $UnitIdentifier;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Groups(['unit:read', 'unit:write'])]
    private UnitType $type;

    #[ORM\Column(type: 'boolean')]
    #[Assert\NotBlank]
    #[Groups(['unit:read', 'unit:write'])]
    private bool $isMainUnit;

    #[ORM\ManyToOne(inversedBy: 'units')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['unit:read', 'unit:write'])]
    private ?Condominium $condominium = null;

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

    public function getCondominium(): ?Condominium
    {
        return $this->condominium;
    }

    public function setCondominium(?Condominium $condominium): static
    {
        $this->condominium = $condominium;

        return $this;
    }
}
