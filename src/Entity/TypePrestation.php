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

    //  /**
    //  * @ORM\OneToMany(targetEntity="App\Entity\Projet", mappedBy="type_prestation")
    //  */
    // private $projets;

    // public function __construct()
    // {
    //     $this->projets = array();
    // }
    
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

    // /**
    //  * Get the value of projets
    //  */ 
    // public function getProjets()
    // {
    //     return $this->projets;
    // }
}
