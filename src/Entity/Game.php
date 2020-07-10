<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GameRepository::class)
 */
class Game
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
    private $title;

    /**
     * @ORM\ManyToMany(targetEntity=Genre::class, inversedBy="games")
     */
    private $genre;

    /**
     * @ORM\ManyToOne(targetEntity=Publisher::class, inversedBy="games")
     */
    private $publisher;

    /**
     * @ORM\Column(type="date")
     */
    private $publishing_date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $special_edition;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type_special_edition;

    /**
     * @ORM\ManyToOne(targetEntity=Condition::class, inversedBy="games")
     */
    private $condition;

    /**
     * @ORM\ManyToMany(targetEntity=Platform::class, inversedBy="games")
     */
    private $platform;

    public function __construct()
    {
        $this->genre = new ArrayCollection();
        $this->platform = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|Genre[]
     */
    public function getGenre(): Collection
    {
        return $this->genre;
    }

    public function addGenre(Genre $genre): self
    {
        if (!$this->genre->contains($genre)) {
            $this->genre[] = $genre;
        }

        return $this;
    }

    public function removeGenre(Genre $genre): self
    {
        if ($this->genre->contains($genre)) {
            $this->genre->removeElement($genre);
        }

        return $this;
    }

    public function getPublisher(): ?Publisher
    {
        return $this->publisher;
    }

    public function setPublisher(?Publisher $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getPublishingDate(): ?\DateTimeInterface
    {
        return $this->publishing_date;
    }

    public function setPublishingDate(\DateTimeInterface $publishing_date): self
    {
        $this->publishing_date = $publishing_date;

        return $this;
    }

    public function getSpecialEdition(): ?bool
    {
        return $this->special_edition;
    }

    public function setSpecialEdition(bool $special_edition): self
    {
        $this->special_edition = $special_edition;

        return $this;
    }

    public function getTypeSpecialEdition(): ?string
    {
        return $this->type_special_edition;
    }

    public function setTypeSpecialEdition(?string $type_special_edition): self
    {
        $this->type_special_edition = $type_special_edition;

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

    /**
     * @return Collection|Platform[]
     */
    public function getPlatform(): Collection
    {
        return $this->platform;
    }

    public function addPlatform(Platform $platform): self
    {
        if (!$this->platform->contains($platform)) {
            $this->platform[] = $platform;
        }

        return $this;
    }

    public function removePlatform(Platform $platform): self
    {
        if ($this->platform->contains($platform)) {
            $this->platform->removeElement($platform);
        }

        return $this;
    }
}
