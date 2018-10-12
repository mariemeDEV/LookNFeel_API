<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity
 */
class Client
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
     * @ORM\Column(name="nom_entreprise", type="string", length=30, nullable=false)
     */
    private $nomEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="télèphone", type="string", length=20, nullable=false)
     */
    private $télèphone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=30, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="userName", type="string", length=30, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="pasword", type="string", length=30, nullable=false)
     */
    private $pasword;

     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Projet", mappedBy="client")
     */
    private $projets;

    public function __construct()
    {
        $this->projets = array();
    }

    /**
     * @return Projet[]
     */
    public function getprojets()
    {
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
     * Get the value of nomEntreprise
     *
     * @return  string
     */ 
    public function getNomEntreprise()
    {
        return $this->nomEntreprise;
    }

    /**
     * Set the value of nomEntreprise
     *
     * @param  string  $nomEntreprise
     *
     * @return  self
     */ 
    public function setNomEntreprise(string $nomEntreprise)
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    /**
     * Get the value of télèphone
     *
     * @return  string
     */ 
    public function getTélèphone()
    {
        return $this->télèphone;
    }

    /**
     * Set the value of télèphone
     *
     * @param  string  $télèphone
     *
     * @return  self
     */ 
    public function setTélèphone(string $télèphone)
    {
        $this->télèphone = $télèphone;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return  string
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  string  $email
     *
     * @return  self
     */ 
    public function setEmail(string $email)
    {
        $this->email = $email;

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
     * Get the value of pasword
     *
     * @return  string
     */ 
    public function getPasword()
    {
        return $this->pasword;
    }

    /**
     * Set the value of pasword
     *
     * @param  string  $pasword
     *
     * @return  self
     */ 
    public function setPasword(string $pasword)
    {
        $this->pasword = $pasword;

        return $this;
    }
}