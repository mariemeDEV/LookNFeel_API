<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=30, nullable=false)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="e_mail", type="string", length=30, nullable=false)
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipe", inversedBy="utilisateur")
     */
    private $equipe;

    /**
     * @var int
     */
    private $idEquipe;

    public function setEquipe(?Equipe $equipe): self
    {
        $this->equipe = $equipe->getId();

        return $this;
    }

    // public function getEquipe(): Equipe
    // {
    //     return $this->equipe;
    // }

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
     * @return  string
     */ 
    public function getEMail()
    {
        return $this->eMail;
    }

    /**
     * Set the value of eMail
     *
     * @param  string  $eMail
     *
     * @return  self
     */ 
    public function setEMail(string $eMail)
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
     * @return  int
     */ 
    public function getIdEquipe()
    {
        return $this->idEquipe;
    }

    /**
     * Set the value of idEquipe
     *
     * @param  int  $idEquipe
     *
     * @return  self
     */ 
    public function setIdEquipe(int $idEquipe)
    {
        $this->idEquipe = $idEquipe;

        return $this;
    }
}