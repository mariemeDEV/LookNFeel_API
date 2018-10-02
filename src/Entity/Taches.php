<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taches
 *
 * @ORM\Table(name="taches", indexes={@ORM\Index(name="id_etape", columns={"id_etape"})})
 * @ORM\Entity
 */
class Taches
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
