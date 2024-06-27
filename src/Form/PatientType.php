<?php

namespace App\Form;

use App\Entity\Assureur;
use App\Entity\Domain;
use App\Entity\Nationalite;
use App\Entity\Patient;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('age')
            ->add('adresse')
            ->add('ville')
            ->add('genre')
            ->add('telephone')
            ->add('gsm')
            ->add('email')
            ->add('etatCivil')
            ->add('nomConjoint')
            ->add('LieuParent')
            ->add('NbrEnfant')
            ->add('Taille')
            ->add('poids')
            ->add('groupSanguin')
            ->add('profession')
            ->add('nCnss')
            ->add('identUnique')
            ->add('priseEnCharge')
            ->add('medecin')
            ->add('datePrdv', null, [
                'widget' => 'single_text',
            ])
            ->add('dateDrdv', null, [
                'widget' => 'single_text',
            ])
            ->add('motCles')
            ->add('CodeApci')
            ->add('regCam')
            ->add('dateValidite', null, [
                'widget' => 'single_text',
            ])
            ->add('qualite')
            ->add('nationalite', EntityType::class, [
                'class' => Nationalite::class,
                'choice_label' => 'id',
            ])
            ->add('domaine', EntityType::class, [
                'class' => Domain::class,
                'choice_label' => 'id',
            ])
            ->add('assureur', EntityType::class, [
                'class' => Assureur::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}
