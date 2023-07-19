<?php

namespace App\Form;

use App\Entity\Collector;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CollectorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('type')
            ->add('number')
            ->add('description')
            ->add('accessory')
            ->add('price')
            ->add('link_amazon')
            ->add('link_fnac')
            ->add('universe');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Collector::class,
        ]);
    }
}
