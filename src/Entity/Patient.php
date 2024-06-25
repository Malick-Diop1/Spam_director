<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PatientRepository::class)]
class Patient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $genre = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $gsm = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $etatCivil = null;

    #[ORM\Column(length: 255)]
    private ?string $nomConjoint = null;

    #[ORM\Column(length: 255)]
    private ?string $LieuParent = null;

    #[ORM\Column(length: 255)]
    private ?string $NbrEnfant = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $Taille = null;

    #[ORM\Column]
    private ?int $poids = null;

    #[ORM\Column(length: 255)]
    private ?string $groupSanguin = null;

    #[ORM\Column(length: 255)]
    private ?string $profession = null;

    #[ORM\Column(length: 255)]
    private ?string $nCnss = null;

    #[ORM\Column(length: 255)]
    private ?string $identUnique = null;

    #[ORM\Column(length: 255)]
    private ?string $priseEnCharge = null;

    #[ORM\Column(length: 255)]
    private ?string $assureur = null;

    #[ORM\Column(length: 255)]
    private ?string $medcin = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datePrdv = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDrdv = null;

    #[ORM\Column(length: 255)]
    private ?string $motCles = null;

    #[ORM\Column(length: 255)]
    private ?string $CodeApci = null;

    #[ORM\Column(length: 255)]
    private ?string $regCam = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateValidite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $qualite = null;

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
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

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
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): static
    {
        $this->genre = $genre;

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

    public function getEtatCivil(): ?string
    {
        return $this->etatCivil;
    }

    public function setEtatCivil(string $etatCivil): static
    {
        $this->etatCivil = $etatCivil;

        return $this;
    }

    public function getNomConjoint(): ?string
    {
        return $this->nomConjoint;
    }

    public function setNomConjoint(string $nomConjoint): static
    {
        $this->nomConjoint = $nomConjoint;

        return $this;
    }

    public function getLieuParent(): ?string
    {
        return $this->LieuParent;
    }

    public function setLieuParent(string $LieuParent): static
    {
        $this->LieuParent = $LieuParent;

        return $this;
    }

    public function getNbrEnfant(): ?string
    {
        return $this->NbrEnfant;
    }

    public function setNbrEnfant(string $NbrEnfant): static
    {
        $this->NbrEnfant = $NbrEnfant;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->Taille;
    }

    public function setTaille(string $Taille): static
    {
        $this->Taille = $Taille;

        return $this;
    }

    public function getPoids(): ?int
    {
        return $this->poids;
    }

    public function setPoids(int $poids): static
    {
        $this->poids = $poids;

        return $this;
    }

    public function getGroupSanguin(): ?string
    {
        return $this->groupSanguin;
    }

    public function setGroupSanguin(string $groupSanguin): static
    {
        $this->groupSanguin = $groupSanguin;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): static
    {
        $this->profession = $profession;

        return $this;
    }

    public function getNCnss(): ?string
    {
        return $this->nCnss;
    }

    public function setNCnss(string $nCnss): static
    {
        $this->nCnss = $nCnss;

        return $this;
    }

    public function getIdentUnique(): ?string
    {
        return $this->identUnique;
    }

    public function setIdentUnique(string $identUnique): static
    {
        $this->identUnique = $identUnique;

        return $this;
    }

    public function getPriseEnCharge(): ?string
    {
        return $this->priseEnCharge;
    }

    public function setPriseEnCharge(string $priseEnCharge): static
    {
        $this->priseEnCharge = $priseEnCharge;

        return $this;
    }

    public function getAssureur(): ?string
    {
        return $this->assureur;
    }

    public function setAssureur(string $assureur): static
    {
        $this->assureur = $assureur;

        return $this;
    }

    public function getMedcin(): ?string
    {
        return $this->medcin;
    }

    public function setMedcin(string $medcin): static
    {
        $this->medcin = $medcin;

        return $this;
    }

    public function getDatePrdv(): ?\DateTimeInterface
    {
        return $this->datePrdv;
    }

    public function setDatePrdv(\DateTimeInterface $datePrdv): static
    {
        $this->datePrdv = $datePrdv;

        return $this;
    }

    public function getDateDrdv(): ?\DateTimeInterface
    {
        return $this->dateDrdv;
    }

    public function setDateDrdv(\DateTimeInterface $dateDrdv): static
    {
        $this->dateDrdv = $dateDrdv;

        return $this;
    }

    public function getMotCles(): ?string
    {
        return $this->motCles;
    }

    public function setMotCles(string $motCles): static
    {
        $this->motCles = $motCles;

        return $this;
    }

    public function getCodeApci(): ?string
    {
        return $this->CodeApci;
    }

    public function setCodeApci(string $CodeApci): static
    {
        $this->CodeApci = $CodeApci;

        return $this;
    }

    public function getRegCam(): ?string
    {
        return $this->regCam;
    }

    public function setRegCam(string $regCam): static
    {
        $this->regCam = $regCam;

        return $this;
    }

    public function getDateValidite(): ?\DateTimeInterface
    {
        return $this->dateValidite;
    }

    public function setDateValidite(\DateTimeInterface $dateValidite): static
    {
        $this->dateValidite = $dateValidite;

        return $this;
    }

    public function getQualite(): ?string
    {
        return $this->qualite;
    }

    public function setQualite(?string $qualite): static
    {
        $this->qualite = $qualite;

        return $this;
    }
}
