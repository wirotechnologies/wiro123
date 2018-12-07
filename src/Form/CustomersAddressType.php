<?php

namespace App\Form;

use App\Entity\CustomersAddress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomersAddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('active')
            ->add('startActive')
            ->add('endActive')
            ->add('createdDate')
            ->add('updatedDate')
            ->add('idCustomers')
            ->add('idAddresses')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CustomersAddress::class,
        ]);
    }
}
