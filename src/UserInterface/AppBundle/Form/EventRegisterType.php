<?php

namespace App\UserInterface\AppBundle\Form;

use App\UserInterface\AppBundle\Entity\Event;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventRegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Tytuł: ',
                'required' => false,
                'attr' => [
                    'title' => 'Tytuł'
                ]
            ])
            ->add('description', TextType::class, [
                'label' => 'Opis: ',
                'required' => false,
                'attr' => [
                    'title' => 'Opis'
                ]
            ])
            ->add('date_start', DateType::class, [
                'label' => 'Data rozpoczęcia: ',
                'required' => false,
                'attr' => [
                    'title' => 'Data rozpoczęcia'
                ]
            ])
            ->add('date_end', DateType::class, [
                'label' => 'Data zakończenia: ',
                'required' => false,
                'attr' => [
                    'title' => 'Data zakończenia'
                ]
            ])
            ->add('save', SubmitType::class, ['label' => 'Zapisz'])
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => Event::class]);
    }
}