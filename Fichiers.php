<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fichiers
 *
 * @ORM\Entity
 */
class Fichiers
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Etapes", inversedBy="fichiers")
     */
    private $etapes;

    public function setEtape(?Etapes $etapes): self
    {
        $this->etapes = $etapes;

        return $this;
    }


}
