<?php

namespace App\Repository;

use App\Entity\HTMLImageElement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HTMLImageElement|null find($id, $lockMode = null, $lockVersion = null)
 * @method HTMLImageElement|null findOneBy(array $criteria, array $orderBy = null)
 * @method HTMLImageElement[]    findAll()
 * @method HTMLImageElement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HTMLImageElementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HTMLImageElement::class);
    }

    // /**
    //  * @return HTMLImageElement[] Returns an array of HTMLImageElement objects
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
    public function findOneBySomeField($value): ?HTMLImageElement
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
