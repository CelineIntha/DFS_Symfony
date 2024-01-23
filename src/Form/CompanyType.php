<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\Customer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('address')
            ->add('phone')
            ->add('customers', EntityType::class, [
                'class' => Customer::class,
                'multiple' => true,
                'choice_label' => 'name',
                // si elle est vraie : va créer des checkbox ou radio (on a radio si multiple = false)
                'expanded' => true,
                // pas obligé de mettre une catégorie
                'required' => false,
                // permet de faire les changements de catégories d'un film, c'est quand il y a un MappedBy dans l'Entité il faut ajouter
                // by_reference
                'by_reference' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
