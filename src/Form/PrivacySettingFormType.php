<?php

namespace App\Form;

use App\Entity\PrivacySetting;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrivacySettingFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('share_board_game')
            ->add('share_book')
            ->add('share_collectible')
            ->add('share_console')
            ->add('share_game')
            ->add('share_manga')
            ->add('share_movie')
            ->add('share_serie')
            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PrivacySetting::class,
        ]);
    }
}
