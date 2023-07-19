<?php

namespace App\Entity;

use App\Repository\UniverseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniverseRepository::class)]
class Universe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\OneToMany(mappedBy: 'universe', targetEntity: Collector::class)]
    private $collectors;

    public function __construct()
    {
        $this->collectors = new ArrayCollection();
    }

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getCollectors(): Collection
    {
        return $this->collectors;
    }

    public function addCollector(Collector $collector): self
    {
        if (!$this->collectors->contains($collector)) {
            $this->collectors->add($collector);
            $collector->setUniverse($this);
        }

        return $this;
    }

    public function removeCollector(Collector $collector): self
    {
        if ($this->collectors->removeElement($collector)) {
            // set the owning side to null (unless already changed)
            if ($collector->getUniverse() === $this) {
                $collector->setUniverse(null);
            }
        }

        return $this;
    }
}
