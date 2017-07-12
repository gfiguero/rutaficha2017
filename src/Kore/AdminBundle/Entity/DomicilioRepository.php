<?php

namespace Kore\AdminBundle\Entity;

/**
 * DomicilioRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DomicilioRepository extends \Doctrine\ORM\EntityRepository
{
    public function count($roles = false)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('count(d.id)')
            ->from('KoreAdminBundle:Domicilio', 'd')
        ;
        if($roles) $qb->where('d.rol IS NOT NULL');
        else $qb->where('d.rol IS NULL');
        return $qb->getQuery()->getSingleScalarResult();
    }

    public function countRoles()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('count(distinct d.rol)')
            ->from('KoreAdminBundle:Domicilio', 'd')
        ;
        return $qb->getQuery()->getSingleScalarResult();
    }
}