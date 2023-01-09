<?php

namespace App\Form\PageParts;

use App\Entity\PageParts\HeaderPagePart;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HeaderPagePartAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $names = HeaderPagePart::$supportedHeaders;
        array_walk($names, function (&$item) { $item = 'Header '.$item; });

        $builder->add('niv', ChoiceType::class, [
            'label' => 'pagepart.header.type',
            'choices' => array_combine($names, HeaderPagePart::$supportedHeaders),
            'required' => true,
        ]);
        $builder->add('title', TextType::class, [
            'label' => 'pagepart.header.title',
            'required' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HeaderPagePart::class,
        ]);
    }
}
