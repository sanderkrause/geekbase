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
        $form = $event->getForm();
        $data = $event->getData();

        if (!ctype_digit($data)) {
            $entityClass = $this->entityClass;
            /** @var AutoCreateable $entity */
            $entity = new $entityClass();
            $entity->setName($data);
            $this->entityManager->persist($entity);
            $this->entityManager->flush();
            $this->entityManager->refresh($entity);
            $form->setData($entity);
            $event->setData((string)$entity->getId());
        }
    }
}