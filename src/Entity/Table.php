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

    #[ORM\ManyToOne(targetEntity: Restaurant::class, inversedBy: 'tables')]
    private $restaurant;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $status;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $reserveFrom;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $reserveTo;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $thumbNailName;

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
        return 'Masa: '. $this->getType() . ' ' . $this->getChairsNumber() . ' - Restaurant: ' . $this->getRestaurant();
    }


    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getReserveFrom(): ?\DateTimeInterface
    {
        return $this->reserveFrom;
    }

    public function setReserveFrom(?\DateTimeInterface $reserveFrom): self
    {
        $this->reserveFrom = $reserveFrom;

        return $this;
    }

    public function getReserveTo(): ?\DateTimeInterface
    {
        return $this->reserveTo;
    }

    public function setReserveTo(?\DateTimeInterface $reserveTo): self
    {
        $this->reserveTo = $reserveTo;

        return $this;
    }

    public function getThumbNailName(): ?string
    {
        return $this->thumbNailName;
    }

    public function setThumbNailName(?string $thumbNailName): self
    {
        $this->thumbNailName = $thumbNailName;

        return $this;
    }
}
