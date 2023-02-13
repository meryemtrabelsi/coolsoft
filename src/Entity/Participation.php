<?php

namespace App\Entity;

use App\Repository\ParticipationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipationRepository::class)]
class Participation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $codeticket = null;

    #[ORM\ManyToOne(inversedBy: 'participations')]
    private ?Utilisateur $utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'participations')]
    private ?Evennement $evennement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeticket(): ?string
    {
        return $this->codeticket;
    }

    public function setCodeticket(string $codeticket): self
    {
        $this->codeticket = $codeticket;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getEvennement(): ?Evennement
    {
        return $this->evennement;
    }

    public function setEvennement(?Evennement $evennement): self
    {
        $this->evennement = $evennement;

        return $this;
    }
}
