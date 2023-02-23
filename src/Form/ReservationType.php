<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('is_status', ChoiceType::class, [
                'choices' => [
                    'Confirm' => true,
                    'Cancelled' => false,
                ],
                'label' => 'Status of Reservation :',
                'required' => true, // Make the field obligation
                'expanded' => true, // Display choices as radio buttons
                'multiple' => false, // Only allow one choice to be selected
                'choice_label' => function ($value, $key, $index) { // Define a callback to generate custom labels for each choice
                    if ($value) {
                        return 'Confirm';
                    } else {
                        return 'Cancelled';
                    }
                },
                'data' => true, // Set default value to true (Confirm)
            ])
            ->add('create_at', DateTimeType::class, [
                'label' => 'Created At :',
                'required' => false,
                'input' => 'datetime_immutable',
                'widget' => 'single_text',
            ])
           // ->add('seance')
         //   ->add('utilisateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
