<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponses
 *
 * @ORM\Entity
 */
class Reponses
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
     * @ORM\Column(name="response", type="string", length=500, nullable=false)
     */
    private $response;


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
     * @ORM\ManyToOne(targetEntity="App\Entity\Commentaires", inversedBy="reponses")
     */
    private $commentaires;

    public function setCommentaires(?Commentaires $commentaires): self
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    /**
     * Get the value of response
     *
     * @return  string
     */ 
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set the value of response
     *
     * @param  string  $response
     *
     * @return  self
     */ 
    public function setResponse(string $response)
    {
        $this->response = $response;

        return $this;
    }
}
