<?php

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RestaurantRepository::class)]
class Restaurant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $location;

    #[ORM\Column(type: 'time')]
    private $openHour;

    #[ORM\Column(type: 'time')]
    private $closingHour;

    #[ORM\Column(type: 'string', length: 20)]
    private $phone;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\OneToMany(mappedBy: 'restaurant', targetEntity: Reservation::class)]
    private $reservations;

    #[ORM\OneToMany(mappedBy: 'restaurant', targetEntity: Table::class)]
    private $tables;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $ThumbnailName;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\OneToOne(mappedBy: 'restaurant', targetEntity: Reservation::class, cascade: ['persist', 'remove'])]
    private $reservation;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->tables = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getOpenHour(): ?\DateTimeInterface
    {
        return $this->openHour;
    }

    public function setOpenHour(\DateTimeInterface $openHour): self
    {
        $this->openHour = $openHour;

        return $this;
    }

    public function getClosingHour(): ?\DateTimeInterface
    {
        return $this->closingHour;
    }

    public function setClosingHour(\DateTimeInterface $closingHour): self
    {
        $this->closingHour = $closingHour;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setRestaurant($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getRestaurant() === $this) {
                $reservation->setRestaurant(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName() . ' ' . $this->getLocation();
    }

    /**
     * @return Collection<int, Table>
     */
    public function getTables(): Collection
    {
        return $this->tables;
    }

    public function addTable(Table $table): self
    {
        if (!$this->tables->contains($table)) {
            $this->tables[] = $table;
            $table->setRestaurant($this);
        }

        return $this;
    }

    public function removeTable(Table $table): self
    {
        if ($this->tables->removeElement($table)) {
            // set the owning side to null (unless already changed)
            if ($table->getRestaurant() === $this) {
                $table->setRestaurant(null);
            }
        }

        return $this;
    }

    public function getThumbnailName(): ?string
    {
        return $this->ThumbnailName;
    }

    public function setThumbnailName(?string $ThumbnailName): self
    {
        $this->ThumbnailName = $ThumbnailName;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): self
    {
        // unset the owning side of the relation if necessary
        if ($reservation === null && $this->reservation !== null) {
            $this->reservation->setRestaurant(null);
        }

        // set the owning side of the relation if necessary
        if ($reservation !== null && $reservation->getRestaurant() !== $this) {
            $reservation->setRestaurant($this);
        }

        $this->reservation = $reservation;

        return $this;
    }
}
