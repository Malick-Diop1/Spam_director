<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SpecialiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialiteRepository::class)]
#[ApiResource]
class Specialite
{

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $user_create;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $user_update;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $user_delete;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $date_create;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $date_update;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $date_delete;






    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    public function getUserCreate(): ?string
    {
        return $this->user_create;
    }

    public function setUserCreate(?string $user_create): static
    {
        $this->user_create = $user_create;

        return $this;
    }

    public function getUserUpdate(): ?string
    {
        return $this->user_update;
    }

    public function setUserUpdate(?string $user_update): static
    {
        $this->user_update = $user_update;

        return $this;
    }

    public function getUserDelete(): ?string
    {
        return $this->user_delete;
    }

    public function setUserDelete(?string $user_delete): static
    {
        $this->user_delete = $user_delete;

        return $this;
    }

    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->date_create;
    }

    public function setDateCreate(?\DateTimeInterface $date_create): static
    {
        $this->date_create = $date_create;

        return $this;
    }

    public function getDateUpdate(): ?\DateTimeInterface
    {
        return $this->date_update;
    }

    public function setDateUpdate(?\DateTimeInterface $date_update): static
    {
        $this->date_update = $date_update;

        return $this;
    }

    public function getDateDelete(): ?\DateTimeInterface
    {
        return $this->date_delete;
    }

    public function setDateDelete(?\DateTimeInterface $date_delete): static
    {
        $this->date_delete = $date_delete;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }


    public function __toString()
    {
      return "".$this->getcode()." ".$this->getlibelle();
    }
}