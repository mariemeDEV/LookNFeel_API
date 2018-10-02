<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet
 *
 * @ORM\Table(name="projet", indexes={@ORM\Index(name="id_equipe", columns={"id_equipe"}), @ORM\Index(name="id_utilisateur", columns={"id_utilisateur"})})
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
     * @var \Equipe
     *
     * @ORM\ManyToOne(targetEntity="Equipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_equipe", referencedColumnName="id")
     * })
     */
    private $idEquipe;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id")
     * })
     */
    private $idUtilisateur;

     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Etapes", mappedBy="projet")
     */
    private $etapes;


//Classe Etapes 

    public function __construct(){
        $this->etapes = new ArrayCollection();
    }

/**@return ArrayCollection/Etapes */
    public function getEtapes(){
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

    /**
     * Get the value of idUtilisateur
     *
     * @return  \Utilisateur
     */ 
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * Set the value of idUtilisateur
     *
     * @param  \Utilisateur  $idUtilisateur
     *
     * @return  self
     */ 
    public function setIdUtilisateur(\Utilisateur $idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
        return $this;
    }
}
