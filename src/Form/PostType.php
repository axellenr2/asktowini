<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Categorys;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content')
            ->add('categorys', EntityType::class, ['class' =>categorys::class, 'choice_label' =>'title'])
            ->add('images', FileType::class,[
                'multiple' => true,
                'mapped' => false
              ])
            ->add('imageprincipale', FileType::class,[
                'multiple' => true,
                'mapped' => false
              ])
              ->add('datetime')
              
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
