<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConditionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConditionRepository::class)
 * @ORM\Table(name="`condition`")
 */
class Condition implements \Stringable, AutoCreateable
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
     * @ORM\OneToMany(targetEntity=Movie::class, mappedBy="condition")
     */
    private $movies;

    /**
     * @ORM\OneToMany(targetEntity=Serie::class, mappedBy="condition")
     */
    private $series;

    /**
     * @ORM\OneToMany(targetEntity=Console::class, mappedBy="condition")
     */
    private $consoles;

    /**
     * @ORM\OneToMany(targetEntity=Book::class, mappedBy="condition")
     */
    private $books;

    /**
     * @ORM\OneToMany(targetEntity=BoardGame::class, mappedBy="condition")
     */
    private $boardGames;

    /**
     * @ORM\OneToMany(targetEntity=Game::class, mappedBy="condition")
     */
    private $games;

    /**
     * @ORM\OneToMany(targetEntity=Manga::class, mappedBy="condition")
     */
    private $mangas;

    /**
     * @ORM\OneToMany(targetEntity=Collectible::class, mappedBy="condition")
     */
    private $collectibles;

    public function __construct()
    {
        $this->movies = new ArrayCollection();
        $this->series = new ArrayCollection();
        $this->consoles = new ArrayCollection();
        $this->books = new ArrayCollection();
        $this->boardGames = new ArrayCollection();
        $this->games = new ArrayCollection();
        $this->mangas = new ArrayCollection();
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
     * @return Collection|Movie[]
     */
    public function getMovies(): Collection
    {
        return $this->movies;
    }

    public function addMovie(Movie $movie): self
    {
        if (!$this->movies->contains($movie)) {
            $this->movies[] = $movie;
            $movie->addCondition($this);
        }

        return $this;
    }

    public function removeMovie(Movie $movie): self
    {
        if ($this->movies->contains($movie)) {
            $this->movies->removeElement($movie);
            $movie->removeCondition($this);
        }

        return $this;
    }

    /**
     * @return Collection|Serie[]
     */
    public function getSeries(): Collection
    {
        return $this->series;
    }

    public function addSeries(Serie $series): self
    {
        if (!$this->series->contains($series)) {
            $this->series[] = $series;
            $series->setCondition($this);
        }

        return $this;
    }

    public function removeSeries(Serie $series): self
    {
        if ($this->series->contains($series)) {
            $this->series->removeElement($series);
            // set the owning side to null (unless already changed)
            if ($series->getCondition() === $this) {
                $series->setCondition(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Console[]
     */
    public function getConsoles(): Collection
    {
        return $this->consoles;
    }

    public function addConsole(Console $console): self
    {
        if (!$this->consoles->contains($console)) {
            $this->consoles[] = $console;
            $console->setCondition($this);
        }

        return $this;
    }

    public function removeConsole(Console $console): self
    {
        if ($this->consoles->contains($console)) {
            $this->consoles->removeElement($console);
            // set the owning side to null (unless already changed)
            if ($console->getCondition() === $this) {
                $console->setCondition(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Book[]
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
            $book->setCondition($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->contains($book)) {
            $this->books->removeElement($book);
            // set the owning side to null (unless already changed)
            if ($book->getCondition() === $this) {
                $book->setCondition(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BoardGame[]
     */
    public function getBoardGames(): Collection
    {
        return $this->boardGames;
    }

    public function addBoardGame(BoardGame $boardGame): self
    {
        if (!$this->boardGames->contains($boardGame)) {
            $this->boardGames[] = $boardGame;
            $boardGame->setCondition($this);
        }

        return $this;
    }

    public function removeBoardGame(BoardGame $boardGame): self
    {
        if ($this->boardGames->contains($boardGame)) {
            $this->boardGames->removeElement($boardGame);
            // set the owning side to null (unless already changed)
            if ($boardGame->getCondition() === $this) {
                $boardGame->setCondition(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Game[]
     */
    public function getGames(): Collection
    {
        return $this->games;
    }

    public function addGame(Game $game): self
    {
        if (!$this->games->contains($game)) {
            $this->games[] = $game;
            $game->setCondition($this);
        }

        return $this;
    }

    public function removeGame(Game $game): self
    {
        if ($this->games->contains($game)) {
            $this->games->removeElement($game);
            // set the owning side to null (unless already changed)
            if ($game->getCondition() === $this) {
                $game->setCondition(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Manga[]
     */
    public function getMangas(): Collection
    {
        return $this->mangas;
    }

    public function addManga(Manga $manga): self
    {
        if (!$this->mangas->contains($manga)) {
            $this->mangas[] = $manga;
            $manga->setCondition($this);
        }

        return $this;
    }

    public function removeManga(Manga $manga): self
    {
        if ($this->mangas->contains($manga)) {
            $this->mangas->removeElement($manga);
            // set the owning side to null (unless already changed)
            if ($manga->getCondition() === $this) {
                $manga->setCondition(null);
            }
        }

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
            $collectible->setCondition($this);
        }

        return $this;
    }

    public function removeCollectible(Collectible $collectible): self
    {
        if ($this->collectibles->contains($collectible)) {
            $this->collectibles->removeElement($collectible);
            // set the owning side to null (unless already changed)
            if ($collectible->getCondition() === $this) {
                $collectible->setCondition(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getName() ?? '';
    }
}
