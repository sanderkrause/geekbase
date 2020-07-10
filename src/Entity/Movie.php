<?php

namespace App\Entity;

use App\Repository\MovieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MovieRepository::class)
 */
class Movie
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
     * @ORM\Column(type="smallint")
     */
    private $release_year;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imdb_link;

    /**
     * @ORM\ManyToMany(targetEntity=Genre::class, inversedBy="movies")
     */
    private $genre;

    /**
     * @ORM\ManyToOne(targetEntity=Condition::class, inversedBy="movies")
     */
    private $condition_id;

    public function __construct()
    {
        $this->genre = new ArrayCollection();
        $this->condition_id = new ArrayCollection();
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

    public function getReleaseYear(): ?int
    {
        return $this->release_year;
    }

    public function setReleaseYear(int $release_year): self
    {
        $this->release_year = $release_year;

        return $this;
    }

    public function getImdbLink(): ?string
    {
        return $this->imdb_link;
    }

    public function setImdbLink(?string $imdb_link): self
    {
        $this->imdb_link = $imdb_link;

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

    /**
     * @return Collection|Condition[]
     */
    public function getCondition(): Collection
    {
        return $this->condition_id;
    }

    public function addCondition(Condition $condition): self
    {
        if (!$this->condition_id->contains($condition)) {
            $this->condition_id[] = $condition;
        }

        return $this;
    }

    public function removeCondition(Condition $condition): self
    {
        if ($this->condition_id->contains($condition)) {
            $this->condition_id->removeElement($condition);
        }

        return $this;
    }
}
