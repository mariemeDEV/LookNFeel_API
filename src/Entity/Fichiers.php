<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fichiers
 *
 * @ORM\Table(name="fichiers", indexes={@ORM\Index(name="id_etape", columns={"id_etape"})})
 * @ORM\Entity
 */
class Fichiers
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var \Etapes
     *
     * @ORM\ManyToOne(targetEntity="Etapes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_etape", referencedColumnName="id")
     * })
     */
    private $idEtape;



    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nom
     *
     * @return  string
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @param  string  $nom
     *
     * @return  self
     */ 
    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of idEtape
     *
     * @return  \Etapes
     */ 
    public function getIdEtape()
    {
        return $this->idEtape;
    }

    /**
     * Set the value of idEtape
     *
     * @param  \Etapes  $idEtape
     *
     * @return  self
     */ 
    public function setIdEtape(\Etapes $idEtape)
    {
        $this->idEtape = $idEtape;

        return $this;
    }
}
