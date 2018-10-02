<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur", indexes={@ORM\Index(name="id_equipe", columns={"id_equipe"})})
 * @ORM\Entity
 */
class Utilisateur
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
     * @ORM\Column(name="prenom", type="string", length=30, nullable=false)
     */
    private $prenom;

    /**
     * @var int
     *
     * @ORM\Column(name="nom",type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=30, nullable=false)
     */
    private $telephone;

    /**
     * @var int
     *
     * @ORM\Column(name="e_mail", type="integer", nullable=false)
     */
    private $eMail;

    /**
     * @var string
     *
     * @ORM\Column(name="profil", type="string", length=0, nullable=false)
     */
    private $profil;

    /**
     * @var string
     *
     * @ORM\Column(name="userName", type="string", length=30, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=30, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=60, nullable=false)
     */
    private $photo;

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
     * @ORM\OneToMany(targetEntity="App\Entity\Projet", mappedBy="utilisateur")
     */
    private $projets;

//Classe  Projets au cas oû le user a le profil client, il posséde des projets
        public function __construct(){
            $this->projets = new ArrayCollection();
        }
/**
 * @return ArrayCollection/Projet
 */
        public function getProjets() {
            return $this->projets;
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
     * Get the value of prenom
     *
     * @return  string
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @param  string  $prenom
     *
     * @return  self
     */ 
    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of nom
     *
     * @return  int
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @param  int  $nom
     *
     * @return  self
     */ 
    public function setNom(int $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of telephone
     *
     * @return  string
     */ 
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @param  string  $telephone
     *
     * @return  self
     */ 
    public function setTelephone(string $telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of eMail
     *
     * @return  int
     */ 
    public function getEMail()
    {
        return $this->eMail;
    }

    /**
     * Set the value of eMail
     *
     * @param  int  $eMail
     *
     * @return  self
     */ 
    public function setEMail(int $eMail)
    {
        $this->eMail = $eMail;

        return $this;
    }

    /**
     * Get the value of profil
     *
     * @return  string
     */ 
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Set the value of profil
     *
     * @param  string  $profil
     *
     * @return  self
     */ 
    public function setProfil(string $profil)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get the value of username
     *
     * @return  string
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @param  string  $username
     *
     * @return  self
     */ 
    public function setUsername(string $username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     *
     * @return  string
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param  string  $password
     *
     * @return  self
     */ 
    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of photo
     *
     * @return  string
     */ 
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @param  string  $photo
     *
     * @return  self
     */ 
    public function setPhoto(string $photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of idEquipe
     *
     * @return  \Equipe
     */ 
    public function getIdEquipe()
    {
        return $this->idEquipe;
    }

    /**
     * Set the value of idEquipe
     *
     * @param  \Equipe  $idEquipe
     *
     * @return  self
     */ 
    public function setIdEquipe(\Equipe $idEquipe)
    {
        $this->idEquipe = $idEquipe;

        return $this;
    }
}
