<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponses
 *
 * @ORM\Table(name="reponses", indexes={@ORM\Index(name="id_commentaire", columns={"id_commentaire"})})
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
     * @ORM\Column(name="content", type="string", length=500, nullable=false)
     */
    private $content;

    /**
     * @var \Commentaires
     *
     * @ORM\ManyToOne(targetEntity="Commentaires")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_commentaire", referencedColumnName="id")
     * })
     */
    private $idCommentaire;



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
     * Get the value of content
     *
     * @return  string
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @param  string  $content
     *
     * @return  self
     */ 
    public function setContent(string $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of idCommentaire
     *
     * @return  \Commentaires
     */ 
    public function getIdCommentaire()
    {
        return $this->idCommentaire;
    }

    /**
     * Set the value of idCommentaire
     *
     * @param  \Commentaires  $idCommentaire
     *
     * @return  self
     */ 
    public function setIdCommentaire(\Commentaires $idCommentaire)
    {
        $this->idCommentaire = $idCommentaire;

        return $this;
    }
}
