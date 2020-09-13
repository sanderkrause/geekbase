<?php

namespace App\Repository;

use App\Entity\Movie;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Movie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movie[]    findAll()
 * @method Movie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Movie::class);
    }

    public function countUserMovies(User $user): int
    {
        $query = $this->createQueryBuilder('m')
            ->select('count(m)')
            ->where('m.user = :user')
            ->setParameter(':user', $user->getId())
            ->getQuery();

        try {
            $count = (int)$query->getSingleScalarResult();
        } catch (NoResultException $e) {
            $count = 0;
        } catch (NonUniqueResultException $e) {
            $count = 0;
        }
        return $count;
    }

    public function countUniqueGenres(User $user): int
    {
        $query = $this->createQueryBuilder('n')
            ->select('count(distinct genres)')
            ->andWhere('m.user = :user')
            ->setParameter(':user', $user->getId())
            ->leftJoin('m.genre', 'genres')
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
}
