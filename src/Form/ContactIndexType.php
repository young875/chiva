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

class ContactIndexType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr'=>[
                    'placeholder' => 'Nom & Prénom *'
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
            ->add('message', TextareaType::class, [
                'label' => 'Votre numéro de téléphone',
                'attr'=>[
                    'rows' => 2,
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
