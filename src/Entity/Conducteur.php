<?php

namespace App\Entity;

use App\Repository\ConducteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConducteurRepository::class)
 */
class Conducteur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=12)
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $condition_condu;

    /**
     * @ORM\OneToMany(targetEntity=Trajet::class, mappedBy="conducteur")
     */
    private $conducteurs;

    /**
     * @ORM\OneToMany(targetEntity=Vehicule::class, mappedBy="conducteur")
     */
    private $vehicules;

    /**
     * @ORM\OneToMany(targetEntity=Compte::class, mappedBy="conducteur")
     */
    private $conducteur;

    public function __construct()
    {
        $this->conducteurs = new ArrayCollection();
        $this->vehicules = new ArrayCollection();
        $this->conducteur = new ArrayCollection();
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

    public function getConditionCondu(): ?string
    {
        return $this->condition_condu;
    }

    public function setConditionCondu(?string $condition_condu): self
    {
        $this->condition_condu = $condition_condu;

        return $this;
    }

    /**
     * @return Collection|Trajet[]
     */
    public function getConducteurs(): Collection
    {
        return $this->conducteurs;
    }

    public function addConducteur(Trajet $conducteur): self
    {
        if (!$this->conducteurs->contains($conducteur)) {
            $this->conducteurs[] = $conducteur;
            $conducteur->setConducteur($this);
        }

        return $this;
    }

    public function removeConducteur(Trajet $conducteur): self
    {
        if ($this->conducteurs->removeElement($conducteur)) {
            // set the owning side to null (unless already changed)
            if ($conducteur->getConducteur() === $this) {
                $conducteur->setConducteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Vehicule[]
     */
    public function getVehicules(): Collection
    {
        return $this->vehicules;
    }

    public function addVehicule(Vehicule $vehicule): self
    {
        if (!$this->vehicules->contains($vehicule)) {
            $this->vehicules[] = $vehicule;
            $vehicule->setConducteur($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): self
    {
        if ($this->vehicules->removeElement($vehicule)) {
            // set the owning side to null (unless already changed)
            if ($vehicule->getConducteur() === $this) {
                $vehicule->setConducteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Compte[]
     */
    public function getConducteur(): Collection
    {
        return $this->conducteur;
    }
}
