<?php

namespace App\Repository;

use App\Entity\HTMLElement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HTMLElement|null find($id, $lockMode = null, $lockVersion = null)
 * @method HTMLElement|null findOneBy(array $criteria, array $orderBy = null)
 * @method HTMLElement[]    findAll()
 * @method HTMLElement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HTMLElementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HTMLElement::class);
    }

    // /**
    //  * @return HTMLElement[] Returns an array of HTMLElement objects
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
    public function findOneBySomeField($value): ?HTMLElement
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
