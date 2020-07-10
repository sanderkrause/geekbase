<?php

namespace App\Entity;

use App\Repository\MangaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MangaRepository::class)
 */
class Manga
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
     * @ORM\ManyToOne(targetEntity=Publisher::class, inversedBy="mangas")
     */
    private $publisher;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $volume;

    /**
     * @ORM\ManyToOne(targetEntity=Condition::class, inversedBy="mangas")
     */
    private $condition;

    /**
     * @ORM\Column(type="string", length=13, nullable=true)
     */
    private $barcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $serieName;

    /**
     * @ORM\ManyToOne(targetEntity=Genre::class, inversedBy="mangas")
     */
    private $genre;

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

    public function getPublisher(): ?Publisher
    {
        return $this->publisher;
    }

    public function setPublisher(?Publisher $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getVolume(): ?int
    {
        return $this->volume;
    }

    public function setVolume(?int $volume): self
    {
        $this->volume = $volume;

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

    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    public function setBarcode(?string $barcode): self
    {
        $this->barcode = $barcode;

        return $this;
    }

    public function getSerieName(): ?string
    {
        return $this->serieName;
    }

    public function setSerieName(?string $serieName): self
    {
        $this->serieName = $serieName;

        return $this;
    }

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): self
    {
        $this->genre = $genre;

        return $this;
    }
}
