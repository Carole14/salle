<?php

namespace App\Entity;

use App\Repository\PermsRepository;
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
}
