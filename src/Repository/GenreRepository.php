<?php

namespace App\Repository;

use App\Entity\Game;
use App\Entity\Genre;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Genre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Genre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Genre[]    findAll()
 * @method Genre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GenreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Genre::class);
    }

    /**
     * @param User $user
     * @return Genre[]
     */
    public function getUserGenres(User $user): array
    {
        $query = $this->createQueryBuilder('genre')
            ->select()
            ->join(Game::class, 'game')
            ->where('game.user = :user')
            ->setParameter(':user', $user->getId())
            ->getQuery();

        return $query->getResult();
    }

    /**
     * @param string $sortField
     * @param string $sortOrder Either Doctrine\Common\Collections\Criteria::ASC or Doctrine\Common\Collections\Criteria::DESC
     * @return Genre[]
     */
    public function getSortedGenres(string $sortField, string $sortOrder = Criteria::ASC): array
    {
        return $this->findBy([], [$sortField => $sortOrder]);
    }
}
