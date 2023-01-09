<?php

namespace App\Form\PageParts;

use App\Entity\PageParts\TextPagePart;
use Kunstmaan\AdminBundle\Form\WysiwygType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TextPagePartAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder->add('content', WysiwygType::class, [
            'required' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TextPagePart::class,
        ]);
    }
}
