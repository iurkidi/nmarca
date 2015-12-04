<?php

namespace uni\bundle\marcaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * comentarios
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class comentarios
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
     * @ORM\Column(name="tit", type="string", length=50)
     */
    private $tit;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="text")
     */
    private $descrip;

    /**
     * @var string
     *
     * @ORM\Column(name="nick", type="string", length=50)
     */
    private $nick;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;


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
     * Set tit
     *
     * @param string $tit
     * @return comentarios
     */
    public function setTit($tit)
    {
        $this->tit = $tit;

        return $this;
    }

    /**
     * Get tit
     *
     * @return string 
     */
    public function getTit()
    {
        return $this->tit;
    }

    /**
     * Set descrip
     *
     * @param string $descrip
     * @return comentarios
     */
    public function setDescrip($descrip)
    {
        $this->descrip = $descrip;

        return $this;
    }

    /**
     * Get descrip
     *
     * @return string 
     */
    public function getDescrip()
    {
        return $this->descrip;
    }

    /**
     * Set nick
     *
     * @param string $nick
     * @return comentarios
     */
    public function setNick($nick)
    {
        $this->nick = $nick;

        return $this;
    }

    /**
     * Get nick
     *
     * @return string 
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return comentarios
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }
    
    /**
    * @ORM\ManyToOne(targetEntity="noticias", inversedBy="comentarioss", cascade={"remove"})    
    */
    protected $noticia;

    /**
     * Set noticia
     *
     * @param \uni\bundle\marcaBundle\Entity\noticias $noticia
     * @return comentarios
     */
    public function setNoticia(\uni\bundle\marcaBundle\Entity\noticias $noticia = null)
    {
        $this->noticia = $noticia;

        return $this;
    }

    /**
     * Get noticia
     *
     * @return \uni\bundle\marcaBundle\Entity\noticias 
     */
    public function getNoticia()
    {
        return $this->noticia;
    }
}
