<?php

namespace App\Entity;

use App\Repository\CollectibleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CollectibleRepository::class)
 */
class Collectible
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=CollectibleType::class, inversedBy="collectibles")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Condition::class, inversedBy="collectibles")
     */
    private $condition;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $external_link;

    /**
     * @ORM\Column(type="boolean")
     */
    private $boxed;

    public function __construct()
    {
        $this->type = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|CollectibleType[]
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(CollectibleType $type): self
    {
        if (!$this->type->contains($type)) {
            $this->type[] = $type;
        }

        return $this;
    }

    public function removeType(CollectibleType $type): self
    {
        if ($this->type->contains($type)) {
            $this->type->removeElement($type);
        }

        return $this;
    }

    public function getCondition(): ?Condition
    {
        return $this->condition;
    }

    public function setCondition(?Condition $condition): self
    {
        $this->condition = $condition;

        return $this;
    }

    public function getExternalLink(): ?string
    {
        return $this->external_link;
    }

    public function setExternalLink(?string $external_link): self
    {
        $this->external_link = $external_link;

        return $this;
    }

    public function getBoxed(): ?bool
    {
        return $this->boxed;
    }

    public function setBoxed(bool $boxed): self
    {
        $this->boxed = $boxed;

        return $this;
    }
}
