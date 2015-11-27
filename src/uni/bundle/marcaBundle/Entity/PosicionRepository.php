<?php
namespace uni\bundle\marcaBundle\Entity;
use Doctrine\ORM\EntityRepository;


/**
 * @ORM\Entity(repositoryClass="uni\bundle\marcaBundle\Entity\PosicionRepository")
 */
class PosicionRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT p FROM UniBlogBundle:Post p ORDER BY p.Nombre ASC')
            ->getResult();
    }
}

?>
