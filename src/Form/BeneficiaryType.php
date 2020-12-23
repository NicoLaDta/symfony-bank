<?php

namespace App\Form;

use App\Entity\Beneficiary;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BeneficiaryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('iban')
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'username',
                'disabled' => 'true'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Beneficiary::class,
        ]);
    }
}
