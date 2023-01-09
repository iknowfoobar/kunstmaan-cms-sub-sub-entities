<?php

namespace App\Form\PageParts;

use App\Entity\PageParts\LinkPagePart;
use Kunstmaan\NodeBundle\Form\Type\URLChooserType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LinkPagePartAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder->add('url', URLChooserType::class, [
            'required' => true,
            'label' => false,
        ]);
        $builder->add('text', TextType::class, [
            'required' => true,
        ]);
        $builder->add('openInNewWindow', CheckboxType::class, [
            'required' => false,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LinkPagePart::class,
        ]);
    }
}
