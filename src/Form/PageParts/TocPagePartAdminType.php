<?php

namespace App\Form\PageParts;

use App\Entity\PageParts\TocPagePart;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TocPagePartAdminType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TocPagePart::class,
        ]);
    }
}
