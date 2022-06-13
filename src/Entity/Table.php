<?php

namespace App\Entity;

use App\Repository\TableRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TableRepository::class)]
#[ORM\Table(name: '`table`')]
class Table
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $chairsNumber;

    #[ORM\Column(type: 'string', length: 255)]
    private $position;

    #[ORM\Column(type: 'string', length: 255)]
    private $type;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $minimalConsummation;

    #[ORM\ManyToOne(targetEntity: Reservation::class, inversedBy: 'tables')]
    private $reservation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChairsNumber(): ?int
    {
        return $this->chairsNumber;
    }

    public function setChairsNumber(int $chairsNumber): self
    {
        $this->chairsNumber = $chairsNumber;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getMinimalConsummation(): ?int
    {
        return $this->minimalConsummation;
    }

    public function setMinimalConsummation(?int $minimalConsummation): self
    {
        $this->minimalConsummation = $minimalConsummation;

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): self
    {
        $this->reservation = $reservation;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getType() . ' ' . $this->getChairsNumber();
    }
}
