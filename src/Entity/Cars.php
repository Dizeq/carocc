<?php

namespace App\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CarsRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=CarsRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Cars
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2, max=255, minMessage="La marque doit faire plus de 2 caractères", maxMessage="La marque ne doit pas faire plus de 255 caractères")
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2, max=255, minMessage="Le modèle doit faire plus de 2 caractères", maxMessage="Le modèle ne peut pas faire plus de 255 caractères")
     */
    private $modele;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=1, max=255, minMessage="Le kilométrages ne peut pas être vide", maxMessage="Le kilométrage ne peut pas faire plus de 255 caractères")
     */
    private $kilometre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=4, max=255, minMessage="Le prix doit faire minimum 4 caractères", maxMessage="Le Prix ne peut pas faire plus de 255 caractères")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=1, max=2, minMessage="Le nombre de proprio ne peut pas être vide", maxMessage="Le nombre de proprio ne peut pas être supérieur à 10")
     */
    private $proprietaire;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3, max=255, minMessage="La cylindrée doit faire 3 caractères minimum", maxMessage="La cylindrée ne peut pas faire plus de 255 caractères")
     */
    private $cylindree;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2, max=255, minMessage="La puissance ne peut pas être inférieure à 10", maxMessage="La puissance ne peut pas faire plus de 255 caractères")
     */
    private $puissance;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3, max=255, minMessage="Le carburant doit faire plus de 2 caractères", maxMessage="Le carburant ne peut pas faire plus de 255 caractères")
     */
    private $carburant;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $mecirculation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=1, max=255, minMessage="La transmission ne peut pas être vide", maxMessage="La transmission ne peut pas faire plus de 255 caractères")
     */
    private $transmission;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=10, max=255, minMessage="La description ne peut pas être vide", maxMessage="La description ne peut pas faire plus de 255 caractères")
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=10, max=255, minMessage="Les options ne peuvent pas être vide", maxMessage="Les options ne peut pas faire plus de 255 caractères")
     */
    private $options;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cover_image;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="cars")
     */
    private $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }
    /**
     * Permet d'initialiser le slug automatiquement s'il n'est pas fourni 
     * @ORM\PrePersist
     * @ORM\PreUpdate
     * 
     * @return void
     */
    public function initializeSlug(){
        if(empty($this->slug)){
            $slugify = new Slugify();
            $this->slug = $slugify->slugify($this->description);
        }
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getKilometre(): ?string
    {
        return $this->kilometre;
    }

    public function setKilometre(string $kilometre): self
    {
        $this->kilometre = $kilometre;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getProprietaire(): ?string
    {
        return $this->proprietaire;
    }

    public function setProprietaire(string $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getCylindree(): ?string
    {
        return $this->cylindree;
    }

    public function setCylindree(string $cylindree): self
    {
        $this->cylindree = $cylindree;

        return $this;
    }

    public function getPuissance(): ?string
    {
        return $this->puissance;
    }

    public function setPuissance(string $puissance): self
    {
        $this->puissance = $puissance;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    public function setCarburant(string $carburant): self
    {
        $this->carburant = $carburant;

        return $this;
    }

    public function getMecirculation(): ?string
    {
        return $this->mecirculation;
    }

    public function setMecirculation(string $mecirculation): self
    {
        $this->mecirculation = $mecirculation;

        return $this;
    }

    public function getTransmission(): ?string
    {
        return $this->transmission;
    }

    public function setTransmission(string $transmission): self
    {
        $this->transmission = $transmission;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getOptions(): ?string
    {
        return $this->options;
    }

    public function setOptions(string $options): self
    {
        $this->options = $options;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCoverImage(): ?string
    {
        return $this->cover_image;
    }

    public function setCoverImage(string $cover_image): self
    {
        $this->cover_image = $cover_image;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $caption->setCars($this);
        }

        return $this;
    }

    public function removeImages(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getCars() === $this) {
                $image->setCars(null);
            }
        }

        return $this;
    }
}
