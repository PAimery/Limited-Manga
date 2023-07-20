<?php

namespace App\Form;

use App\Entity\Collector;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class CollectorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr' => [
                    'placeholder' => 'Titre du collector',
                ]
            ])
            ->add('type', TextType::class, [
                'label' => 'type',
                'attr' => [
                    'placeholder' => 'Type de collector',
                ]
            ])
            ->add('number', IntegerType::class, [
                'label' => 'numéro',
                'attr' => [
                    'placeholder' => 'N° du collector',
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => [
                    'placeholder' => 'Description du collector',
                ]
            ])
            ->add('accessory', TextareaType::class, [
                'label' => 'Contenu',
                'attr' => [
                    'placeholder' => 'Contenu du collector (coffret)',
                ]
            ])
            ->add('price', NumberType::class, [
                'label' => 'Prix',
                'attr' => [
                    'placeholder' => 'Prix du collector',
                ]
            ])
            ->add('link_amazon', TextType::class, [
                'label' => 'Amazon',
                'attr' => [
                    'placeholder' => 'Lien amazon',
                ]
            ])
            ->add('link_fnac', TextType::class, [
                'label' => 'Fnac',
                'attr' => [
                    'placeholder' => 'Lien fnac',
                ]
            ])
            ->add('universe', null, [
                'choice_label' => 'title',
                'label' => 'Univers',
                'attr' => [
                    'placeholder' => 'Sélectionne l\'univers',
                ]
            ])
            ->add('imageCollector', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => true,
                'download_uri' => true,
                'label' => 'Image',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Collector::class,
        ]);
    }
}
