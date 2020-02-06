<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', ChoiceType::class, [
                'choices' => Contact::TITRE
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'attr'=>[
                    'placeholder' => 'Prénom *'
                ]
            ])
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr'=>[
                    'placeholder' => 'Nom *'
                ]
            ])
            ->add('sujet', TextType::class, [
                'label' => 'Nom',
                'attr'=>[
                    'placeholder' => 'Sujet *'
                ]
            ])
            ->add('mail', EmailType::class, [
                'label' => 'Votre E-mail',
                'attr'=>[
                    'placeholder' => 'Email *'
                ]
            ])
            ->add('telephone', TextType::class, [
                'label' => 'Votre numéro de téléphone',
                'attr'=>[
                    'placeholder' => 'Votre numéro de téléphone *'
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre numéro de téléphone',
                'attr'=>[
                    'rows' => 8,
                    'placeholder' => 'Bonjour,

Je souhaite avoir des information sur : '
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
