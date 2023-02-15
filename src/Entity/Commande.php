<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"farouk")]
    private ?string $statue = null;

    #[ORM\Column(length: 255)]
    private ?string $codepromo = null;

    #[ORM\OneToMany(mappedBy: 'commande', targetEntity: Lignedecommande::class)]
    private Collection $lignedecommandes;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?Utilisateur $utilisateur = null;

    public function __construct()
    {
        $this->lignedecommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatue(): ?string
    {
        return $this->statue;
    }

    public function setStatue(string $statue): self
    {
        $this->statue = $statue;

        return $this;
    }

    public function getCodepromo(): ?string
    {
        return $this->codepromo;
    }

    public function setCodepromo(string $codepromo): self
    {
        $this->codepromo = $codepromo;

        return $this;
    }

    /**
     * @return Collection<int, Lignedecommande>
     */
    public function getLignedecommandes(): Collection
    {
        return $this->lignedecommandes;
    }

    public function addLignedecommande(Lignedecommande $lignedecommande): self
    {
        if (!$this->lignedecommandes->contains($lignedecommande)) {
            $this->lignedecommandes->add($lignedecommande);
            $lignedecommande->setCommande($this);
        }

        return $this;
    }

    public function removeLignedecommande(Lignedecommande $lignedecommande): self
    {
        if ($this->lignedecommandes->removeElement($lignedecommande)) {
            // set the owning side to null (unless already changed)
            if ($lignedecommande->getCommande() === $this) {
                $lignedecommande->setCommande(null);
            }
        }

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
}
