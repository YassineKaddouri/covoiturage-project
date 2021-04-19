<?php

namespace App\Entity;

use App\Repository\VoyageurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoyageurRepository::class)
 */
class Voyageur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $cin;

    /**
     * @ORM\Column(type="integer")
     */
    private $tel;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $sexe;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="voyageur")
     */
    private $trajet;

    /**
     * @ORM\OneToMany(targetEntity=Compte::class, mappedBy="voyageur")
     */
    private $voyageur;

    public function __construct()
    {
        $this->trajet = new ArrayCollection();
        $this->voyageur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getTrajet(): Collection
    {
        return $this->trajet;
    }

    public function addTrajet(Reservation $trajet): self
    {
        if (!$this->trajet->contains($trajet)) {
            $this->trajet[] = $trajet;
            $trajet->setVoyageur($this);
        }

        return $this;
    }

    public function removeTrajet(Reservation $trajet): self
    {
        if ($this->trajet->removeElement($trajet)) {
            // set the owning side to null (unless already changed)
            if ($trajet->getVoyageur() === $this) {
                $trajet->setVoyageur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Compte[]
     */
    public function getVoyageur(): Collection
    {
        return $this->voyageur;
    }

    public function addVoyageur(Compte $voyageur): self
    {
        if (!$this->voyageur->contains($voyageur)) {
            $this->voyageur[] = $voyageur;
            $voyageur->setVoyageur($this);
        }

        return $this;
    }

    public function removeVoyageur(Compte $voyageur): self
    {
        if ($this->voyageur->removeElement($voyageur)) {
            // set the owning side to null (unless already changed)
            if ($voyageur->getVoyageur() === $this) {
                $voyageur->setVoyageur(null);
            }
        }

        return $this;
    }
}
