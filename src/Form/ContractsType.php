<?php

namespace App\Form;

use App\Entity\Contracts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContractsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number')
            ->add('pastDueDays')
            ->add('balance')
            ->add('start')
            ->add('lastPayment')
            ->add('lastInvoice')
            ->add('createdDate')
            ->add('updatedDate')
            ->add('idContractTypes')
            ->add('idCustomers')
            ->add('idRecurrence')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contracts::class,
        ]);
    }
}
