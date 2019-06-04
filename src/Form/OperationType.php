<?php
namespace App\Form;

use App\Entity\Operation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\OperatorType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class OperationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('number1',NumberType::class)
            ->add('number2',NumberType::class)
            ->add('operator', ChoiceType::class, [
            'choices' => OperatorType::getChoices(),
                'expanded' =>true
        ])
            ->add('save', SubmitType::class, [
            'label' => 'Execute'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Operation::class
        ]);
    }
}
