<?php

namespace App\Entity;

use App\Repository\CollectibleTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CollectibleTypeRepository::class)
 */
class CollectibleType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Collectible::class, mappedBy="type")
     */
    private $collectibles;

    public function __construct()
    {
        $this->collectibles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Collectible[]
     */
    public function getCollectibles(): Collection
    {
        return $this->collectibles;
    }

    public function addCollectible(Collectible $collectible): self
    {
        if (!$this->collectibles->contains($collectible)) {
            $this->collectibles[] = $collectible;
            $collectible->addType($this);
        }

        return $this;
    }

    public function removeCollectible(Collectible $collectible): self
    {
        if ($this->collectibles->contains($collectible)) {
            $this->collectibles->removeElement($collectible);
            $collectible->removeType($this);
        }

        return $this;
    }
}
