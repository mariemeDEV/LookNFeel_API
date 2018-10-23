<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etapes
 *
 * @ORM\Entity
 */
class Etapes
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
     * @var int
     *
     * @ORM\Column(name="duree", type="integer", nullable=false)
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=0, nullable=false)
     */
    private $etat;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Taches", mappedBy="etapes")
     */
    private $taches;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Fichiers", mappedBy="etapes")
     */
    private $fichiers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaires", mappedBy="etapes")
     */
    private $commentaires;

    public function __construct()
    {
        $this->taches       = array();
        $this->fichiers     = array();
        $this->commentaires = array();
    }

    /**
     * @return Taches[]
     */
    public function getTaches()
    {
        return $this->taches;
    }

    /**
     * @return Fichiers[]
     */
    public function getFichiers()
    {
        return $this->fichiers;
    }

     /**
     * @return Commentaires[]
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Projet", inversedBy="etapes")
     */
    private $projet;

    public function setProjet(?Projet $projet): self
    {
        $this->projet = $projet;

        return $this;
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
     * Get the value of duree
     *
     * @return  int
     */ 
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set the value of duree
     *
     * @param  int  $duree
     *
     * @return  self
     */ 
    public function setDuree(int $duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get the value of etat
     *
     * @return  string
     */ 
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     *
     * @param  string  $etat
     *
     * @return  self
     */ 
    public function setEtat(string $etat)
    {
        $this->etat = $etat;

        return $this;
    }
}
