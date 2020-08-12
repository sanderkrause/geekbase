<?php
declare(strict_types=1);

namespace App\Form\Event;

use App\Entity\AutoCreateable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class AutoCreateSubscriber implements EventSubscriberInterface
{
    /**
     * @var string
     */
    private $entityClass;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(string $entityClass, EntityManagerInterface $entityManager)
    {
        $this->entityClass = $entityClass;
        $this->entityManager = $entityManager;
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents(): array
    {
        return [FormEvents::PRE_SUBMIT => 'handle'];
    }

    /**
     * @param FormEvent $event
     */
    public function handle(FormEvent $event): void
    {
        $data = $event->getData();

        if (!ctype_digit($data)) {
            if (is_string($data)) {
                $data = $this->createEntity($data);
            } elseif (is_array($data)) {
                foreach ($data as $key => $item) {
                    if (!ctype_digit($item)) {
                        $data[$key] = $this->createEntity($item)->getId();
                    }
                }
            }
            $event->setData($data);
        }
    }

    public function createEntity(string $name): AutoCreateable
    {
        $entityClass = $this->entityClass;
        /** @var AutoCreateable $entity */
        $entity = new $entityClass();
        $entity->setName($name);
        $this->entityManager->persist($entity);
        // @todo avoid flushing and refreshing in a loop (outside this function)
        $this->entityManager->flush();
        $this->entityManager->refresh($entity);
        return $entity;
    }
}