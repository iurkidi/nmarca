<?php

namespace uni\bundle\marcaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * anuncios
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class anuncios
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="texto", type="text")
     */
    private $texto;

    /**
     * @var string
     *
     * @ORM\Column(name="compania", type="string", length=50)
     */
    private $compania;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return anuncios
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set texto
     *
     * @param string $texto
     * @return anuncios
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string 
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set compania
     *
     * @param string $compania
     * @return anuncios
     */
    public function setCompania($compania)
    {
        $this->compania = $compania;

        return $this;
    }

    /**
     * Get compania
     *
     * @return string 
     */
    public function getCompania()
    {
        return $this->compania;
    }   
    

    /**
    * @ORM\ManyToMany(targetEntity="noticias", inversedBy="anuncioss")
    */

    private $noticiass;

    public function __construct() {
        $this->noticiass = new ArrayCollection();
    }
    

    /**
     * Add noticiass
     *
     * @param \uni\bundle\marcaBundle\Entity\noticias $noticiass
     * @return anuncios
     */
    public function addNoticiass(\uni\bundle\marcaBundle\Entity\noticias $noticiass)
    {
        $this->noticiass[] = $noticiass;

        return $this;
    }

    /**
     * Remove noticiass
     *
     * @param \uni\bundle\marcaBundle\Entity\noticias $noticiass
     */
    public function removeNoticiass(\uni\bundle\marcaBundle\Entity\noticias $noticiass)
    {
        $this->noticiass->removeElement($noticiass);
    }

    /**
     * Get noticiass
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNoticiass()
    {
        return $this->noticiass;
    }
    
    public function __toString() {
        return $this->nombre;
    }
}
