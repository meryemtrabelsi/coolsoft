<?php

namespace App\Form;

use App\Entity\Seance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SeanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('date')
            ->add('duration')
            ->add('level', ChoiceType::class, [
                'choices' => [
                    'Beginner' => 'Beginner',
                    'Intermediate' => 'Intermediate',
                    'Advanced' => 'Advanced',
                ]])
            ->add('adresse')
            ->add('coach_name', ChoiceType::class, [
                'choices' => [
                    'Ali Felhi' => 'Ali Felhi',
                    'Ahmed Mansour' => 'Ahmed Mansour',
                    'Sami Tayari' => 'Sami Tayari',
                ]])
            ->add('people_nbre',NumberType::class, [
                'attr' => [
                    'min' => 1,
                    'max' => 20,
                ],
            ])

            ->add('description')
            ->add('price')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Seance::class,
        ]);
    }
}
