<?php

namespace App\Entity;

use App\Repository\CollectorRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CollectorRepository::class)]
class Collector
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(nullable: true)]
    private ?int $number = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $accessory = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $link_amazon = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $link_fnac = null;

    #[ORM\ManyToOne(inversedBy: 'collectors')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Universe $universe = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(?int $number): static
    {
        $this->number = $number;

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

    public function getAccessory(): ?string
    {
        return $this->accessory;
    }

    public function setAccessory(?string $accessory): static
    {
        $this->accessory = $accessory;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getLinkAmazon(): ?string
    {
        return $this->link_amazon;
    }

    public function setLinkAmazon(?string $link_amazon): static
    {
        $this->link_amazon = $link_amazon;

        return $this;
    }

    public function getLinkFnac(): ?string
    {
        return $this->link_fnac;
    }

    public function setLinkFnac(?string $link_fnac): static
    {
        $this->link_fnac = $link_fnac;

        return $this;
    }

    public function getUniverse(): ?Universe
    {
        return $this->universe;
    }

    public function setUniverse(?Universe $universe): static
    {
        $this->universe = $universe;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }
}
