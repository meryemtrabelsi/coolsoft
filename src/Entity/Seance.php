<?php

namespace App\Entity;

use App\Repository\SeanceRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SeanceRepository::class)]
class Seance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: 'float')]

    /**
     * @Assert\NotBlank(message=" the duration must be non-empty")
     */
    private ?float $duration = null;

    #[ORM\Column(length: 100)]
    private ?string $level = null;

    #[ORM\Column(length: 255)]
    /**
     * @Assert\NotBlank(message=" the address must be non-empty")
     */
    private ?string $adresse = null;

    #[ORM\Column(length: 100)]
    private ?string $coach_name = null;

    #[ORM\Column]
    /**
     * @Assert\NotBlank(message=" the number of people must be non-empty")

     * @Assert\Range(
     *     min=1,
     *     max=20,
     *     notInRangeMessage="The input value must be between {{ min }} and {{ max }}.",
     *     invalidMessage="The input value must be a valid integer."
     * )
     */
    private ?int $people_nbre = null;
    #[ORM\Column(type: 'boolean', options: ['default' => true])]
    private ?bool $is_available = true;


    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    /**
     * @Assert\NotBlank(message=" the price must be non-empty")
     */
    private ?float $price = null;

    #[ORM\OneToMany(mappedBy: 'seance', targetEntity: Reservation::class)]
    private Collection $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->date = new \DateTime() ;

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date ;

        return $this;
    }

    public function getDuration(): ?float
    {
        return $this->duration;
    }

    public function setDuration(float $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCoachName(): ?string
    {
        return $this->coach_name;
    }

    public function setCoachName(string $coach_name): self
    {
        $this->coach_name = $coach_name;

        return $this;
    }

    public function getPeopleNbre(): ?int
    {
        return $this->people_nbre;
    }

    public function setPeopleNbre(int $people_nbre): self
    {
        $this->people_nbre = $people_nbre;

        return $this;
    }

    public function isIsAvailable(): ?bool
    {
        return $this->is_available;
    }

    public function setIsAvailable(bool $is_available): self
    {
        $this->is_available = $is_available;

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

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
            $this->reservations->add($reservation);
            $reservation->setSeance($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getSeance() === $this) {
                $reservation->setSeance(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->adresse;
    }

}
