<?php

namespace App\Form;

use App\Entity\Partenaire;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormTypeInterface;


class PartenaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class, [
                'label' => 'Nom'
            ])
            ->add('active', TextType::class, [
                'label' => 'actif/inactif'
            ])
            ->add('description')
            ->add('technical_contact', TextType::class, [
                'label' => 'nom du technicien',
            ])
            ->add('commercial_contact', TextType::class, [
                'label' => 'nom du commercial',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Partenaire::class,
        ]);
    }
}
