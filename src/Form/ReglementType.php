<?php

namespace App\Form;

use App\Entity\ModeReglement;
use App\Entity\Patient;
use App\Entity\Reglement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReglementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('integer')
            ->add('date', null, [
                'widget' => 'single_text',
            ])
            ->add('modeReglement')
            ->add('numPiece')
            ->add('montant')
            ->add('observation')
            ->add('patient', EntityType::class, [
                'class' => Patient::class,
                'choice_label' => 'id',
            ])
            ->add('modereglement', EntityType::class, [
                'class' => ModeReglement::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reglement::class,
        ]);
    }
}
