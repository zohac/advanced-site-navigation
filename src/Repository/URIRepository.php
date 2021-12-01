<?php

namespace App\Repository;

use App\Entity\URI;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method URI|null find($id, $lockMode = null, $lockVersion = null)
 * @method URI|null findOneBy(array $criteria, array $orderBy = null)
 * @method URI[]    findAll()
 * @method URI[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class URIRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, URI::class);
    }

    // /**
    //  * @return URI[] Returns an array of URI objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?URI
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
