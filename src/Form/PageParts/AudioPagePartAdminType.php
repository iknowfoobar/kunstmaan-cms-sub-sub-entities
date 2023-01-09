<?php

namespace App\Form\PageParts;

use App\Entity\PageParts\AudioPagePart;
use Kunstmaan\MediaBundle\Form\Type\MediaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AudioPagePartAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('media', MediaType::class, [
            'mediatype' => 'audio',
            'label' => 'mediapagepart.audio.choose',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AudioPagePart::class,
        ]);
    }
}
