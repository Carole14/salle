<?php

namespace App\Entity;

use App\Repository\PermsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PermsRepository::class)]
class Perms
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $newsletter = null;

    #[ORM\Column]
    private ?bool $sale_drinks = null;

    #[ORM\ManyToMany(targetEntity: Partenaire::class, mappedBy: 'partperm')]
    private Collection $partenaires;

    public function __construct()
    {
        $this->partenaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isNewsletter(): ?bool
    {
        return $this->newsletter;
    }

    public function setNewsletter(bool $newsletter): self
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    public function isSaleDrinks(): ?bool
    {
        return $this->sale_drinks;
    }

    public function setSaleDrinks(bool $sale_drinks): self
    {
        $this->sale_drinks = $sale_drinks;

        return $this;
    }

    /**
     * @return Collection<int, Partenaire>
     */
    public function getPartenaires(): Collection
    {
        return $this->partenaires;
    }

    public function addPartenaire(Partenaire $partenaire): self
    {
        if (!$this->partenaires->contains($partenaire)) {
            $this->partenaires[] = $partenaire;
            $partenaire->addPartperm($this);
        }

        return $this;
    }

    public function removePartenaire(Partenaire $partenaire): self
    {
        if ($this->partenaires->removeElement($partenaire)) {
            $partenaire->removePartperm($this);
        }

        return $this;
    }
}
