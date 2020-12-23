<?php

namespace App\Form;

use App\Entity\Transaction;
use App\Entity\User;
use App\Entity\BankAccount;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('amount')
            ->add('date')
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'username',
                'disabled' => 'true'
            ])
            // ->add('debitedAccount')
            ->add('debitedAccount', EntityType::class, [
                'class' => BankAccount::class,
                'choice_label' => 'iban'
            ])
            ->add('CreditedAccount')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transaction::class,
        ]);
    }
}
