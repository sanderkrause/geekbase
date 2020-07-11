<?php

namespace App\Entity;

use App\Repository\ConsoleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConsoleRepository::class)
 */
class Console
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
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity=Condition::class, inversedBy="consoles")
     */
    private $condition;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ports;

    /**
     * @ORM\Column(type="boolean")
     */
    private $rooted;

    /**
     * @ORM\Column(type="boolean")
     */
    private $working;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=13, nullable=true)
     */
    private $barcode;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="consoles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

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

    public function getPorts(): ?string
    {
        return $this->ports;
    }

    public function setPorts(string $ports): self
    {
        $this->ports = $ports;

        return $this;
    }

    public function getRooted(): ?bool
    {
        return $this->rooted;
    }

    public function setRooted(bool $rooted): self
    {
        $this->rooted = $rooted;

        return $this;
    }

    public function getWorking(): ?bool
    {
        return $this->working;
    }

    public function setWorking(bool $working): self
    {
        $this->working = $working;

        return $this;
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

    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    public function setBarcode(?string $barcode): self
    {
        $this->barcode = $barcode;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
