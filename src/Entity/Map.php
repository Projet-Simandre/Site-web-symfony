<?php 
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Map
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 70)]
    private ?string $objet = null;

    #[ORM\Column]
    private string $mapFilename = "";

    public function getMapFilename(): string
    {
        return $this->mapFilename;
    }

    public function setMapFilename(string $mapFilename): self
    {
        $this->mapFilename = $mapFilename;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of objet
     */
    public function getObjet(): ?string
    {
        return $this->objet;
    }

    /**
     * Set the value of objet
     */
    public function setObjet(?string $objet): self
    {
        $this->objet = $objet;

        return $this;
    }
}