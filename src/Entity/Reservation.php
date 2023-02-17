<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="reservations")
     */
    private $client;

    /**
     * @ORM\ManyToMany(targetEntity=sejour::class, inversedBy="reservations")
     */
    private $sejour;

    /**
     * @ORM\Column(type="integer")
     */
    private $customers;

    /**
     * @ORM\Column(type="date")
     */
    private $arrival;

    /**
     * @ORM\Column(type="date")
     */
    private $departure;

    public function __construct()
    {
        $this->sejour = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?user
    {
        return $this->client;
    }

    public function setClient(?user $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection<int, sejour>
     */
    public function getSejour(): Collection
    {
        return $this->sejour;
    }

    public function addSejour(sejour $sejour): self
    {
        if (!$this->sejour->contains($sejour)) {
            $this->sejour[] = $sejour;
        }

        return $this;
    }

    public function removeSejour(sejour $sejour): self
    {
        $this->sejour->removeElement($sejour);

        return $this;
    }

    public function getCustomers(): ?int
    {
        return $this->customers;
    }

    public function setCustomers(int $customers): self
    {
        $this->customers = $customers;

        return $this;
    }

    public function getArrival(): ?\DateTimeInterface
    {
        return $this->arrival;
    }

    public function setArrival(\DateTimeInterface $arrival): self
    {
        $this->arrival = $arrival;

        return $this;
    }

    public function getDeparture(): ?\DateTimeInterface
    {
        return $this->departure;
    }

    public function setDeparture(\DateTimeInterface $departure): self
    {
        $this->departure = $departure;

        return $this;
    }
}
