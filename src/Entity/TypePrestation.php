<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypePrestationRepository")
 */
class TypePrestation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelleType", type="string", length=0, nullable=false)
     */
    private $libelleType;

    /**
     * @var integer
     * @ORM\column(name="montant", type="integer", nullable=true)
     */
    private $montantPrestation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleType(): ?string
    {
        return $this->libelleType;
    }

    public function setLibelleType(string $libelleType): self
    {
        $this->libelleType = $libelleType;

        return $this;
    }

    /**
     * Get the value of montantPrestation
     *
     * @return  integer
     */ 
    public function getMontantPrestation()
    {
        return $this->montantPrestation;
    }

    /**
     * Set the value of montantPrestation
     *
     * @param  integer  $montantPrestation
     *
     * @return  self
     */ 
    public function setMontantPrestation($montantPrestation)
    {
        $this->montantPrestation = $montantPrestation;

        return $this;
    }
}
