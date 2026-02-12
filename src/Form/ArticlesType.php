<?php

namespace App\Form;

use App\Entity\ArticleCategory;
use App\Entity\Articles;
use App\Entity\ArticleTag;
use DateTime;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Titre de l\'article',
                ],
                'empty_data' => 'Article brouillon ' . new \DateTime()->format('d-m-Y h:i'),
                'required' => false,
            ])
            ->add('content')
            ->add('subtitle')
            ->add('status')
            ->add('categoty', EntityType::class, [
                'class' => ArticleCategory::class,
                'choice_label' => 'title',
            ])
            ->add('tag', EntityType::class, [
                'class' => ArticleTag::class,
                'choice_label' => 'title',
            ])
            ->add('champsHorsEntity', TextType::class, [
                'mapped' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Articles::class,
        ]);
    }
}
