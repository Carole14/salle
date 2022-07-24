<?php

namespace App\Form;

use App\Entity\Partenaire;
use App\Entity\Perms;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class PartenaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class, [
                'label' => 'Nom'
            ])
            ->add('active')
            ->add('description')
            ->add('technical_contact', TextType::class, [
                'label' => 'nom du technicien',
            ])
            ->add('commercial_contact', TextType::class, [
                'label' => 'nom du commercial',
            ])
            ->add('email', EmailType::class,[
                'label' => 'Email du partenaire',
                'attr' => ['Merci de saisir le mail du partenaire'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrer le mail du partenaire',
                    ]),
                ],
            ])
            ->add('password', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => 'mot de passe du partenaire',
                'mapped' => false,
                'attr' => ['autocomplete' => 'nouveau mot de passe'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'entrer le mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add ('partperms', PermsType::class, [
                'data_class' => Perms::class,
                'label' => 'permissions',
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
