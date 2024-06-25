<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Medecin;
use App\Entity\Nationalite;
use App\Entity\Specialite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedecinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user_create')
            ->add('user_update')
            ->add('user_delete')
            ->add('date_create', null, [
                'widget' => 'single_text',
            ])
            ->add('date_update', null, [
                'widget' => 'single_text',
            ])
            ->add('date_delete', null, [
                'widget' => 'single_text',
            ])
            ->add('nom')
            ->add('Prenom')
            ->add('dateNaissance', null, [
                'widget' => 'single_text',
            ])
            ->add('adresse')
            ->add('Ville')
            ->add('telephone')
            ->add('gsm')
            ->add('email')
            ->add('fax')
            ->add('specialite', EntityType::class, [
                'class' => Specialite::class,
                'choice_label' => 'id',
            ])
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'id',
            ])
            ->add('nationalite', EntityType::class, [
                'class' => Nationalite::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Medecin::class,
        ]);
    }
}
