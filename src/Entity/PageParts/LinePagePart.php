<?php

namespace App\Entity\PageParts;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'app_line_page_parts')]
class LinePagePart extends AbstractPagePart
{
    public function getDefaultView(): string
    {
        return 'PageParts/LinePagePart/view.html.twig';
    }

    public function getDefaultAdminType(): string
    {
        return \App\Form\PageParts\LinePagePartAdminType::class;
    }
}
