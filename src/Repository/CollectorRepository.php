<?php

namespace App\Repository;

use App\Entity\Collector;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Collector>
 *
 * @method Collector|null find($id, $lockMode = null, $lockVersion = null)
 * @method Collector|null findOneBy(array $criteria, array $orderBy = null)
 * @method Collector[]    findAll()
 * @method Collector[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CollectorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Collector::class);
    }

//    /**
//     * @return Collector[] Returns an array of Collector objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Collector
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
