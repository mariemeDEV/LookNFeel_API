<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FilialeRepository")
 */
class Filiale
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $pays;

     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Client", mappedBy="filiale")
     */
    private $clients;
    

    public function __construct()
    {
        $this->clients = array();
    }

    /**
     * @return Collection|Client[]
     */
    public function getClients()
    {
        return $this->clients;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $Id): self
    {
        $this->Id = $Id;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }
}
