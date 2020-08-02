<?php
declare(strict_types=1);

namespace App\Service;

use App\Form\Event\AutoCreateSubscriber;
use Doctrine\ORM\EntityManagerInterface;

class AutoCreateSubscriberFactory
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createSubscriber(string $entity): AutoCreateSubscriber
    {
        return new AutoCreateSubscriber($entity, $this->entityManager);
    }
}