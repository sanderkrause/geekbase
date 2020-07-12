<?php

namespace App\Repository;

use App\Entity\Game;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Game|null find($id, $lockMode = null, $lockVersion = null)
 * @method Game|null findOneBy(array $criteria, array $orderBy = null)
 * @method Game[]    findAll()
 * @method Game[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Game::class);
    }

    public function countUserGames(User $user): int
    {
        $query = $this->createQueryBuilder('g')
            ->select('count(g)')
            ->where('g.user = :user')
            ->setParameter(':user', $user->getId())
            ->getQuery();

        try {
            $gameCount = (int)$query->getSingleScalarResult();
        } catch (NoResultException $e) {
            $gameCount = 0;
        } catch (NonUniqueResultException $e) {
            $gameCount = 0;
        }
        return $gameCount;
    }

    public function countUniqueGenres(User $user): int
    {
        $query = $this->createQueryBuilder('g')
            ->select('count(distinct genres)')
            ->andWhere('g.user = :user')
            ->setParameter(':user', $user->getId())
            ->leftJoin('g.genre', 'genres')
            ->getQuery();

        try {
            $genres = (int)$query->getSingleScalarResult();
        } catch (NoResultException $e) {
            $genres = 0;
        } catch (NonUniqueResultException $e) {
            $genres = 0;
        }
        return $genres;
    }

    public function countSpecialEditions(User $user)
    {
        $query = $this->createQueryBuilder('g')
            ->select('count(distinct g.publisher)')
            ->andWhere('g.user = :user')
            ->setParameter(':user', $user->getId())
            ->getQuery();

        try {
            $publishers = (int)$query->getSingleScalarResult();
        } catch (NoResultException $e) {
            $publishers = 0;
        } catch (NonUniqueResultException $e) {
            $publishers = 0;
        }
        return $publishers;
    }

    // /**
    //  * @return Game[] Returns an array of Game objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Game
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
