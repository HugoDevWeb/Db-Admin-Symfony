<?php

namespace App\Form;

use App\Entity\Food;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class  FoodType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add("type", EntityType::class, [
                "class" => Type::class,
                "choice_label" => "wording"
            ])
            ->add('price')
            ->add('imageFile', FileType::class, ["required" => false] )
            ->add('calorie')
            ->add('protein')
            ->add('carbohydrate')
            ->add('lipid')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Food::class,
        ]);
    }
}
