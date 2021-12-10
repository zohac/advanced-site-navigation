<?php

namespace App\Repository;

use App\Entity\HTMLLiElement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HTMLLiElement|null find($id, $lockMode = null, $lockVersion = null)
 * @method HTMLLiElement|null findOneBy(array $criteria, array $orderBy = null)
 * @method HTMLLiElement[]    findAll()
 * @method HTMLLiElement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HTMLLiElementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HTMLLiElement::class);
    }

    // /**
    //  * @return HTMLLiElement[] Returns an array of HTMLLiElement objects
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
    public function findOneBySomeField($value): ?HTMLLiElement
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
