<?php
declare(strict_types=1);

namespace App\Form;

use App\Entity\Game;
use App\Entity\Publisher;
use App\Form\Type\AutoCompleteType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GameFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('genre')
            ->add('condition')
            ->add('publisher', AutoCompleteType::class, [
                'class' => Publisher::class,
                'fieldName' => 'publisher',
            ])
            ->add('platform')
            ->add('publishing_date')
            ->add('special_edition')
            ->add('type_special_edition')
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
        ]);
    }
}
