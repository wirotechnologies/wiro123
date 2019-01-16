<?php

namespace App\Form;

use App\Entity\SocioeconomicLevels;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SocioeconomicLevelsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('createdDate')
            ->add('updatedDate')
            ->add('idSocioeconomicLevelsIva')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SocioeconomicLevels::class,
        ]);
    }
}
