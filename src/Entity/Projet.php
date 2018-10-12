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
     * @var string
     *
     * @ORM\Column(name="brief", type="string", length=400, nullable=false)
     */
    private $brief;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipe", inversedBy="projet")
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

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function setEquipe(?Equipe $equipe): self
    {
        $this->equipe = $equipe;

        return $this;
    }

    public function getEquipe(): Equipe
    {
        return $this->equipe;
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
     * Get the value of brief
     *
     * @return  string
     */ 
    public function getBrief()
    {
        return $this->brief;
    }

    /**
     * Set the value of brief
     *
     * @param  string  $brief
     *
     * @return  self
     */ 
    public function setBrief(string $brief)
    {
        $this->brief = $brief;

        return $this;
    }

   

}