<?php

namespace App\Form;

use App\Entity\Produto;
use App\Entity\Proveedor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ProdutoType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder
                ->add('nome', TextType::class, [
                    'label' => false,
                    'attr' => [
                        'class' => 'form-control mb-2',
                        'placeholder' => 'Nome'
                    ],
                ])
                ->add('precio', NumberType::class, [
                    'html5' => true,
                    'label' => false,
                    'scale' => 2,
                    'attr' => [
                        'class' => 'form-control mb-2',
                        'placeholder' => 'Precio'
                    ],
                ])
                ->add('cantidade', IntegerType::class, [
                    'label' => false,
                    'attr' => [
                        'class' => 'form-control mb-2',
                        'placeholder' => 'Cantidade'
                    ],
                ])
                ->add('proveedor', EntityType::class, [
                    'class' => Proveedor::class,
                    'label' => false,
                    'attr' => [
                        'class' => 'form-select mb-2',
                    ],
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            'data_class' => Produto::class,
        ]);
    }

}
