<?php

namespace App\Form;

use App\Entity\Invoices;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoicesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('invoiceDate')
            ->add('totalValue')
            ->add('deadlinePay')
            ->add('valuePastDue')
            ->add('newBalance')
            ->add('referencePayment')
            ->add('suspensionDate')
            ->add('accountsNumberPastDue')
            ->add('createdDate')
            ->add('updatedDate')
            ->add('idEmployees')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Invoices::class,
        ]);
    }
}
