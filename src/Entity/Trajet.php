<?php

namespace App\Entity;

use App\Repository\TrajetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TrajetRepository::class)
 */
class Trajet
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
    private $villedepart;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $villedestination;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_j_sem;

    /**
     * @ORM\Column(type="date")
     */
    private $datedpart;

    /**
     * @ORM\Column(type="date")
     */
    private $datearrive;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $heuredepart;

    /**
     * @ORM\Column(type="time")
     */
    private $heurearrive;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $typetrajet;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity=Conducteur::class, inversedBy="conducteurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $conducteur;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="trajet")
     */
    private $trajets;

    public function __construct()
    {
        $this->trajets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVilledepart(): ?string
    {
        return $this->villedepart;
    }

    public function setVilledepart(string $villedepart): self
    {
        $this->villedepart = $villedepart;

        return $this;
    }

    public function getVilledestination(): ?string
    {
        return $this->villedestination;
    }

    public function setVilledestination(string $villedestination): self
    {
        $this->villedestination = $villedestination;

        return $this;
    }

    public function getDateJSem(): ?\DateTimeInterface
    {
        return $this->date_j_sem;
    }

    public function setDateJSem(?\DateTimeInterface $date_j_sem): self
    {
        $this->date_j_sem = $date_j_sem;

        return $this;
    }

    public function getDatedpart(): ?\DateTimeInterface
    {
        return $this->datedpart;
    }

    public function setDatedpart(\DateTimeInterface $datedpart): self
    {
        $this->datedpart = $datedpart;

        return $this;
    }

    public function getDatearrive(): ?\DateTimeInterface
    {
        return $this->datearrive;
    }

    public function setDatearrive(\DateTimeInterface $datearrive): self
    {
        $this->datearrive = $datearrive;

        return $this;
    }

    public function getHeuredepart(): ?\DateTimeInterface
    {
        return $this->heuredepart;
    }

    public function setHeuredepart(?\DateTimeInterface $heuredepart): self
    {
        $this->heuredepart = $heuredepart;

        return $this;
    }

    public function getHeurearrive(): ?\DateTimeInterface
    {
        return $this->heurearrive;
    }

    public function setHeurearrive(\DateTimeInterface $heurearrive): self
    {
        $this->heurearrive = $heurearrive;

        return $this;
    }

    public function getTypetrajet(): ?string
    {
        return $this->typetrajet;
    }

    public function setTypetrajet(string $typetrajet): self
    {
        $this->typetrajet = $typetrajet;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getConducteur(): ?Conducteur
    {
        return $this->conducteur;
    }

    public function setConducteur(?Conducteur $conducteur): self
    {
        $this->conducteur = $conducteur;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getTrajets(): Collection
    {
        return $this->trajets;
    }

    public function addTrajet(Reservation $trajet): self
    {
        if (!$this->trajets->contains($trajet)) {
            $this->trajets[] = $trajet;
            $trajet->setTrajet($this);
        }

        return $this;
    }

    public function removeTrajet(Reservation $trajet): self
    {
        if ($this->trajets->removeElement($trajet)) {
            // set the owning side to null (unless already changed)
            if ($trajet->getTrajet() === $this) {
                $trajet->setTrajet(null);
            }
        }

        return $this;
    }
}
