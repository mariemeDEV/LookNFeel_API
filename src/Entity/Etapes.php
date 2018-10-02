<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etapes
 *
 * @ORM\Table(name="etapes", indexes={@ORM\Index(name="id_projet", columns={"id_projet"})})
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
     * @var \Projet
     *
     * @ORM\ManyToOne(targetEntity="Projet")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_projet", referencedColumnName="id")
     * })
     */
    private $idProjet;

     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Taches", mappedBy="etapes")
     */
    private $taches;

     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Fichiers", mappedBy="etapes")
     */
    private $fichiers;

     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaires", mappedBy="commentaires")
     */
    private $commentaires;

    public function __construct(){
        $this->taches = new ArrayCollection();
        $this->fichiers = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    //Classe tâches
        public function getTaches() {
            $this->taches = $taches;
        }

    //Classe fichiers
        public function getFichiers() {
            $this->fichiers = $fichiers;
        }

    //Classe commentaires
        public function getCommentaires() {
            $this->commentaires = $commentaires;
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
        public function setDuree(int $duree){
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
        public function setEtat(string $etat){
            $this->etat = $etat;
            return $this;
        }

    /**
     * Get the value of idProjet
     *
     * @return  \Projet
     */ 
        public function getIdProjet() {
        return $this->idProjet;
        }

    /**
     * Set the value of idProjet
     *
     * @param  \Projet  $idProjet
     *
     * @return  self
     */ 
        public function setIdProjet(\Projet $idProjet) {
            $this->idProjet = $idProjet;
            return $this;
        }
}
