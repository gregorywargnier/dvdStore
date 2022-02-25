<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //lastName
            ->add('lastName',TextType::class, [
                "label" => "Nom",
                "attr" => [
                    'class' => "form-control",
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Saisir votre nom",
                    ])
                ]
            ])
            //firstName
            ->add('firstName',TextType::class, [
                "label" => "Prénom",
                "attr" => [
                    'class' => "form-control",
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Saisir votre nom",
                    ])
                ]
            ])
            //phone
            ->add('phone', TextType::class, [
                "label" => "telephone",
                "attr" => [
                    'class'=> "form-control",
                ],
                'constraints' => [
                    new Regex([
                        "pattern" => '/^[0-9]*$/',
                        "message" => "Don't use spaces in your password."
                    ]),
                    new NotBlank([
                        'message' => "Saisir votre numéro de téléphone",
                    ])
                ]
            ])
            //address
            ->add('adress', TextType::class, [
                'label' => 'adresse',
                "attr" => [
                    'class' => "form-control",
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Saisir votre adresse",
                    ])
                ]
            ])
            //additionalAddress
            ->add('additionalAddress', TextType::class, [
                'required' => false,
                'label' => "complément d'adresse",
                "attr" => [
                    'class' => "form-control",

                ],
            ])
            //city
            ->add('city', TextType::class,[
                'label'=> "ville",
                "attr"=>[
                    'class' => 'form-control',
                ]
            ])
            //postalcode
            ->add('postalCode',NumberType::class, [
                'label'=> "code postale",
                "attr" => [
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Saisir votre code postale",
                    ])
                ]
            ])
            //email
            ->add('email', EmailType::class, [
                "label" => "Email",
                "attr" => [
                    "class" => "form-control",
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Saisir votre email",
                    ])
                ]
            ])

            //password
            ->add('password', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
