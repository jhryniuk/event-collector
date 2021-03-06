<?php

namespace App\UserInterface\AppBundle\Form;

use App\UserInterface\AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserRegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Imie: ',
                'required' => false,
                'attr' => [
                    'title' => 'Imie'
                ],
                'constraints' => [
                    new Length([
                        'min' => 3,
                        'minMessage' => 'At least 3 letters.',
                        'max' => 33,
                        'maxMessage' => 'Max 33 letters.'
                    ]),
                    new NotBlank(['message' => 'Cannot be empty.'])
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nazwisko: ',
                'required' => false,
                'attr' => [
                    'title' => 'Nazwisko'
                ]
            ])
            ->add('username', TextType::class, [
                'label' => 'Login: ',
                'required' => false,
                'attr' => [
                    'title' => 'Login'
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Popraw hasło.',
                'required' => true,
                'first_options' => ['label' => 'Hasło: '],
                'second_options' => ['label' => 'Powtórz hasło: ']
            ])
            ->add('age', IntegerType::class, [
                'label' => 'Wiek: ',
                'required' => true,
                'attr' => [
                    'title' => 'Wiek'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email: ',
                'required' => true,
                'attr' => [
                    'title' => 'Email'
                ],
                'constraints' => [
                    new Email()
                ]
            ])
            ->add('save', SubmitType::class, ['label' => 'Zapisz'])
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => User::class]);
    }
}
