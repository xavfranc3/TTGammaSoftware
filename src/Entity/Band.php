<?php

namespace App\Entity;

use App\Repository\BandRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BandRepository::class)
 */
class Band
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $origin;

    /**
     * @ORM\Column(type="integer")
     */
    private $start_year;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $end_year;

    /**
     * @ORM\Column(type="simple_array", nullable=true)
     */
    private $founders = [];

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $members;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $genre;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

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

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin(string $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    public function getStartYear(): ?int
    {
        return $this->start_year;
    }

    public function setStartYear(int $start_year): self
    {
        $this->start_year = $start_year;

        return $this;
    }

    public function getEndYear(): ?int
    {
        return $this->end_year;
    }

    public function setEndYear(?int $end_year): self
    {
        $this->end_year = $end_year;

        return $this;
    }

    public function getFounders(): ?array
    {
        return $this->founders;
    }

    public function setFounders(?array $founders): self
    {
        $this->founders = $founders;

        return $this;
    }

    public function getMembers(): ?int
    {
        return $this->members;
    }

    public function setMembers(?int $members): self
    {
        $this->members = $members;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(?string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
