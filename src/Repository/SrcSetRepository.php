<?php

namespace App\Repository;

use App\Entity\SrcSet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SrcSet|null find($id, $lockMode = null, $lockVersion = null)
 * @method SrcSet|null findOneBy(array $criteria, array $orderBy = null)
 * @method SrcSet[]    findAll()
 * @method SrcSet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SrcSetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SrcSet::class);
    }

    // /**
    //  * @return SrcSet[] Returns an array of SrcSet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SrcSet
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
