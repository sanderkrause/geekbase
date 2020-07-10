<?php

namespace App\Entity;

use App\Repository\BoardGameRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BoardGameRepository::class)
 */
class BoardGame
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
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $max_players;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $min_players;

    /**
     * @ORM\ManyToOne(targetEntity=Condition::class, inversedBy="boardGames")
     */
    private $condition_id;

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

    public function getMaxPlayers(): ?int
    {
        return $this->max_players;
    }

    public function setMaxPlayers(?int $max_players): self
    {
        $this->max_players = $max_players;

        return $this;
    }

    public function getMinPlayers(): ?int
    {
        return $this->min_players;
    }

    public function setMinPlayers(?int $min_players): self
    {
        $this->min_players = $min_players;

        return $this;
    }

    public function getCondition(): ?Condition
    {
        return $this->condition_id;
    }

    public function setCondition(?Condition $condition): self
    {
        $this->condition_id = $condition;

        return $this;
    }
}
