<?php

namespace App\Repository;

use App\Entity\CollectibleType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CollectibleType|null find($id, $lockMode = null, $lockVersion = null)
 * @method CollectibleType|null findOneBy(array $criteria, array $orderBy = null)
 * @method CollectibleType[]    findAll()
 * @method CollectibleType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CollectibleTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CollectibleType::class);
    }

    // /**
    //  * @return CollectibleType[] Returns an array of CollectibleType objects
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
    public function findOneBySomeField($value): ?CollectibleType
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
