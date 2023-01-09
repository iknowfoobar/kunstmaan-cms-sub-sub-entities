<?php

namespace App\Form\PageParts;

use App\Entity\PageParts\LinePagePart;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LinePagePartAdminType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LinePagePart::class,
        ]);
    }
}
