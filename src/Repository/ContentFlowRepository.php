<?php

namespace App\Repository;

use App\Entity\FlowContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FlowContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method FlowContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method FlowContent[]    findAll()
 * @method FlowContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentFlowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FlowContent::class);
    }

    // /**
    //  * @return ContentFlow[] Returns an array of ContentFlow objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContentFlow
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
