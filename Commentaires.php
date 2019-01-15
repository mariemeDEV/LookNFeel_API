<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaires
 *
 * @ORM\Entity
 */
class Commentaires
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
     * @ORM\Column(name="comment", type="string", length=300, nullable=false)
     */
    private $comment;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Etapes", inversedBy="commentaires",cascade={"persist"})
     */
    private $etapes;


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
     * @ORM\OneToMany(targetEntity="App\Entity\Reponses", mappedBy="commentaires")
     */
    private $reponses;

    public function __construct()
    {
        $this->reponses = array();
    }

    /**
     * @return Reponses[]
     */
    public function getReponses()
    {
        return $this->reponses;
    }


  

    /**
     * Get the value of comment
     *
     * @return  string
     */ 
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @param  string  $comment
     *
     * @return  self
     */ 
    public function setComment(string $comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Set the value of etapes
     *
     * @return  self
     */ 
    public function setEtapes($etapes)
    {
        $this->etapes = $etapes;

        return $this;
    }
}
