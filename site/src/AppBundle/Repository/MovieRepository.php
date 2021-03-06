<?php

namespace AppBundle\Repository;

/**
 * MovieRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MovieRepository extends \Doctrine\ORM\EntityRepository
{
    public function recherche($search)
    {
        $qb = $this->createQueryBuilder('movie')
            ->where('movie.name like :search')
            ->setParameter('search', '%' . $search . '%');

        return $qb
            ->getQuery()
            ->getResult();
    }


}
