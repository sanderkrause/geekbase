<?php

namespace App\Repository;

use App\Entity\PrivacySetting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrivacySetting|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrivacySetting|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrivacySetting[]    findAll()
 * @method PrivacySetting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrivacySettingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrivacySetting::class);
    }

    // /**
    //  * @return PrivacySetting[] Returns an array of PrivacySetting objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PrivacySetting
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
