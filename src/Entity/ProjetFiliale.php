<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Client;

/**
 * Projet
 *
 * @ORM\Entity
 */
class ProjetFiliale
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="projet")
     */
    private $client;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;
 
     /**
     * @ORM\Column(name="datePrestation", type="date", nullable=false)
     */
    private $datePrestation;

     /**
     * @var float
     *
     * @ORM\Column(name="billings", type="float", nullable=false)
     */
    private $billings;

      /**
     * @var float
     *
     * @ORM\Column(name="charges", type="float", nullable=false)
     */
    private $charges;

      /**
     * @var float
     *
     * @ORM\Column(name="marges", type="float", nullable=false)
     */
    private $marges;

     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypePrestation", inversedBy="projet_filiale")
     */
    private $typePrestation;

   
    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get the value of client
     */ 
    public function getClient()
    {
        return $this->client->getProjets();
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
     * Get the value of datePrestation
     */ 
    public function getDatePrestation()
    {
        return $this->datePrestation;
    }

    /**
     * Set the value of datePrestation
     *
     * @return  self
     */ 
    public function setDatePrestation($datePrestation)
    {
        $this->datePrestation = $datePrestation;

        return $this;
    }

    /**
     * Get the value of typePrestation
     */ 
    public function getTypePrestation()
    {
        return $this->typePrestation;
    }

    /**
     * Set the value of typePrestation
     *
     * @return  self
     */ 
    public function setTypePrestation($typePrestation)
    {
        $this->typePrestation = $typePrestation;

        return $this;
    }


    /**
     * Get the value of billings
     *
     * @return  float
     */ 
    public function getBillings()
    {
        return $this->billings;
    }

    /**
     * Set the value of billings
     *
     * @param  float  $billings
     *
     * @return  self
     */ 
    public function setBillings(float $billings)
    {
        $this->billings = $billings;

        return $this;
    }

    /**
     * Get the value of charges
     *
     * @return  float
     */ 
    public function getCharges()
    {
        return $this->charges;
    }

    /**
     * Set the value of charges
     *
     * @param  float  $charges
     *
     * @return  self
     */ 
    public function setCharges(float $charges)
    {
        $this->charges = $charges;

        return $this;
    }

    /**
     * Get the value of marges
     *
     * @return  float
     */ 
    public function getMarges()
    {
        return $this->billings - $this->charges;
    }

    /**
     * Set the value of marges
     *
     * @param  float  $marges
     *
     * @return  self
     */ 
    public function setMarges(float $marges)
    {
        $this->marges = $marges;

        return $this;
    }
}