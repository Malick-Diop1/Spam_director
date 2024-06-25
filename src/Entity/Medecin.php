<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MedecinRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedecinRepository::class)]
#[ApiResource]
class Medecin
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
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateNaissance = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Ville = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $gsm = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fax = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Specialite $specialite = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $categorie = null;

    #[ORM\ManyToOne]
    private ?Nationalite $nationalite = null;


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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(?string $Ville): static
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getGsm(): ?string
    {
        return $this->gsm;
    }

    public function setGsm(string $gsm): static
    {
        $this->gsm = $gsm;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): static
    {
        $this->fax = $fax;

        return $this;
    }

    public function getSpecialite(): ?Specialite
    {
        return $this->specialite;
    }

    public function setSpecialite(?Specialite $specialite): static
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getNationalite(): ?Nationalite
    {
        return $this->nationalite;
    }

    public function setNationalite(?Nationalite $nationalite): static
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function __toString()
    {
      return "".$this->getnom()." ".$this->getPrenom()." ".$this->getdateNaissance()." ".$this->getadresse()." ".$this->getVille()." ".$this->gettelephone()." ".$this->getgsm()." ".$this->getemail()." ".$this->getfax()." ".$this->getspecialite()." ".$this->getnationalite();
    }
}
