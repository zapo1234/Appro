<?php

namespace App\Form;

use App\Entity\Toto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;

class TotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('label',  TextareaType::class, [
            'constraints' => [
                new Length([
                    'min' => 3,
                    'minMessage' => 'votre label content est de  {{ limit }} caractères minimum',
                    // max length allowed by Symfony for security reasons
                    'max' => 200,
                    'maxMessage' => 'votre label  doit contenir est de  {{ limit }} caractères maximum',
                    // max length allowed by Symfony for security reasons
                ]),
            ],

        ])
        ->add('completed',  NumberType::class, [
            'constraints' => [
                new Regex([ 'pattern'=>'/^[0-1]/',
                            'message'=> 'le completed contient sois 1 ou null',
                      ])
            ],

        ])
            ->add('name',  TextType::class, [
                'constraints' => [
                    new Length([
                        'min' => 3,
                        'minMessage' => 'votre nom  doit contenir  {{ limit }} caractères au minimum',
                        // max length allowed by Symfony for security reasons
                        'max' => 100,
                        'maxMessage' => 'votre nom doit contenir au maximum  {{ limit }} caractères',
                    ]),
                ],
    
            ])
            ->add('number',  TextType::class, [
                'constraints' => [
                    new Regex([ 'pattern'=> '/^[0-9]{8,12}/',
                                 'message'=> 'le numéro de téléphone doit contenir entre 8 et 12 caractères',
                    
                    ])
                ],
    
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Toto::class,
        ]);
    }
}
