<?php

namespace App\Repository;

use App\Entity\HTMLOListElement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HTMLOListElement|null find($id, $lockMode = null, $lockVersion = null)
 * @method HTMLOListElement|null findOneBy(array $criteria, array $orderBy = null)
 * @method HTMLOListElement[]    findAll()
 * @method HTMLOListElement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HTMLOListElementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HTMLOListElement::class);
    }

    // /**
    //  * @return HTMLOListElement[] Returns an array of HTMLOListElement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HTMLOListElement
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
