<?php

namespace App\Entity;

use App\Repository\PrivacySettingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrivacySettingRepository::class)
 */
class PrivacySetting
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="privacySetting", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="boolean")
     */
    private $share_board_game;

    /**
     * @ORM\Column(type="boolean")
     */
    private $share_book;

    /**
     * @ORM\Column(type="boolean")
     */
    private $share_collectible;

    /**
     * @ORM\Column(type="boolean")
     */
    private $share_console;

    /**
     * @ORM\Column(type="boolean")
     */
    private $share_game;

    /**
     * @ORM\Column(type="boolean")
     */
    private $share_manga;

    /**
     * @ORM\Column(type="boolean")
     */
    private $share_movie;

    /**
     * @ORM\Column(type="boolean")
     */
    private $share_serie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getShareBoardGame(): ?bool
    {
        return $this->share_board_game;
    }

    public function setShareBoardGame(bool $share_board_game): self
    {
        $this->share_board_game = $share_board_game;

        return $this;
    }

    public function getShareBook(): ?bool
    {
        return $this->share_book;
    }

    public function setShareBook(bool $share_book): self
    {
        $this->share_book = $share_book;

        return $this;
    }

    public function getShareCollectible(): ?bool
    {
        return $this->share_collectible;
    }

    public function setShareCollectible(bool $share_collectible): self
    {
        $this->share_collectible = $share_collectible;

        return $this;
    }

    public function getShareConsole(): ?bool
    {
        return $this->share_console;
    }

    public function setShareConsole(bool $share_console): self
    {
        $this->share_console = $share_console;

        return $this;
    }

    public function getShareGame(): ?bool
    {
        return $this->share_game;
    }

    public function setShareGame(bool $share_game): self
    {
        $this->share_game = $share_game;

        return $this;
    }

    public function getShareManga(): ?bool
    {
        return $this->share_manga;
    }

    public function setShareManga(bool $share_manga): self
    {
        $this->share_manga = $share_manga;

        return $this;
    }

    public function getShareMovie(): ?bool
    {
        return $this->share_movie;
    }

    public function setShareMovie(bool $share_movie): self
    {
        $this->share_movie = $share_movie;

        return $this;
    }

    public function getShareSerie(): ?bool
    {
        return $this->share_serie;
    }

    public function setShareSerie(bool $share_serie): self
    {
        $this->share_serie = $share_serie;

        return $this;
    }
}
