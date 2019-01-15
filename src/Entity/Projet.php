<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Client;

/**
 * Projet
 *
 * @ORM\Entity
 */
class Projet
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="projet", cascade={"persist"})
     */
    private $client;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=0, nullable=false)
     */
    private $statut;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=false)
     */
    private $description;

     /**
     * @ORM\Column(name="datePrestation", type="string", nullable=false)
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
     * @ORM\ManyToOne(targetEntity="App\Entity\TypePrestation", inversedBy="projet", cascade={"persist"})
     */
    private $typePrestation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipe", inversedBy="projet", cascade={"persist"})
     */
    private $equipe;

     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Etapes", mappedBy="projet")
     */
    private $etapes;

    public function __construct()
    {
        $this->etapes = array();
    }

    /**
     * @return Etapes[]
     */
    public function getetapes()
    {
        return $this->etapes;
    }

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
     * Get the value of statut
     *
     * @return  string
     */ 
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @param  string  $statut
     *
     * @return  self
     */ 
    public function setStatut(string $statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return  string
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string  $description
     *
     * @return  self
     */ 
    public function setDescription(string $description)
    {
        $this->description = $description;

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

    // /**
    //  * Get the value of client
    //  */ 
    // public function getClient()
    // {
    //     return $this->client;
    // }

    /**
     * Set the value of client
     *
     * @return  self
     */ 
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    // /**
    //  * Get the value of equipe
    //  */ 
    // public function getEquipe()
    // {
    //     return $this->equipe;
    // }

    /**
     * Set the value of equipe
     *
     * @return  self
     */ 
    public function setEquipe($equipe)
    {
        $this->equipe = $equipe;

        return $this;
    }
}