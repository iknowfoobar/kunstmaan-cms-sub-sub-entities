<?php

namespace App\Form\PageParts;

use App\Entity\PageParts\ButtonPagePart;
use Kunstmaan\NodeBundle\Form\Type\URLChooserType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ButtonPagePartAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder->add('linkUrl', URLChooserType::class, [
            'required' => true,
        ]);
        $builder->add('linkText', TextType::class, [
            'required' => true,
        ]);
        $builder->add('linkNewWindow', CheckboxType::class, [
            'required' => false,
        ]);
        $builder->add('type', ChoiceType::class, [
            'choices' => array_combine(ButtonPagePart::$types, ButtonPagePart::$types),
            'placeholder' => false,
            'required' => true,
        ]);
        $builder->add('size', ChoiceType::class, [
            'choices' => array_combine(ButtonPagePart::$sizes, ButtonPagePart::$sizes),
            'placeholder' => false,
            'required' => true,
        ]);
        $builder->add('position', ChoiceType::class, [
            'choices' => array_combine(ButtonPagePart::$positions, ButtonPagePart::$positions),
            'placeholder' => false,
            'required' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ButtonPagePart::class,
        ]);
    }
}
