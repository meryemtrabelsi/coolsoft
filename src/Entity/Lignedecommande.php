<?php

namespace App\Entity;

use App\Repository\LignedecommandeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LignedecommandeRepository::class)]
class Lignedecommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Positive(message:"la quantite >0")]
    private ?string $quantite = null;

    #[ORM\ManyToOne(inversedBy: 'lignedecommandes')]
    private ?Commande $commande = null;

    #[ORM\ManyToOne(inversedBy: 'lignedecommandes')]
    private ?Produit $produit = null;

    #[ORM\Column(nullable: true)]
    #[Assert\Positive(message:"la TOTALE >0")]
    private ?int $totale = null;





    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?string
    {
        return $this->quantite;
    }

    public function setQuantite(string $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getTotale(): ?int
    {
        return $this->totale;
    }

    public function setTotale(?int $totale): self
    {
        $this->totale = $totale;

        return $this;
    }
    public function calculertotale(?int $totale): self
    {
        $this->totale = $totale;

        return $this;
    }


}
