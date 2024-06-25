<?php

namespace App\Form;

use App\Entity\Horaire;
use App\Entity\Patient;
use App\Entity\Rdv;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RdvType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numero')
            ->add('annee')
            ->add('date', null, [
                'widget' => 'single_text',
            ])
            ->add('observation')
            ->add('horaire', EntityType::class, [
                'class' => Horaire::class,
                'choice_label' => 'id',
            ])
            ->add('patient', EntityType::class, [
                'class' => Patient::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rdv::class,
        ]);
    }
}
