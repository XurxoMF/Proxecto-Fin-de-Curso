<?php

namespace App\Form;

use App\Entity\Proveedor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;

class ProveedorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nome', TextType::class, [
                    'label' => false,
                    'attr' => [
                        'class' => 'form-control mb-2',
                        'placeholder' => 'Nome'
                    ],
                ])
            ->add('tlf', TelType::class, [
                    'label' => false,
                    'attr' => [
                        'class' => 'form-control mb-2',
                        'placeholder' => 'Teléfono',
                        'maxlength' => 9,
                        'minlenght' => 9
                    ],
                ])
            ->add('gmail', EmailType::class, [
                    'label' => false,
                    'attr' => [
                        'class' => 'form-control mb-2',
                        'placeholder' => 'Gmail'
                    ],
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Proveedor::class,
        ]);
    }
}
