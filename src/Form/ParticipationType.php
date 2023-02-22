<?php

namespace App\Form;
use App\Entity\Evennement;
use App\Entity\Utilisateur;
use App\Entity\Participation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ParticipationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('codeticket')
            
            ->add('utilisateur',EntityType::class,[
                'class'=>Utilisateur::class,
                'choice_label'=>'id'
            ])
            ->add('evennement',EntityType::class,[
                'class'=>evennement::class,
                'choice_label'=>'id'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Participation::class,
        ]);
    }
}
