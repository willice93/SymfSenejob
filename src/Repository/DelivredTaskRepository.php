<?php

namespace App\Repository;

use App\Entity\DelivredTask;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DelivredTask|null find($id, $lockMode = null, $lockVersion = null)
 * @method DelivredTask|null findOneBy(array $criteria, array $orderBy = null)
 * @method DelivredTask[]    findAll()
 * @method DelivredTask[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DelivredTaskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DelivredTask::class);
    }

    // /**
    //  * @return DelivredTask[] Returns an array of DelivredTask objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DelivredTask
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
