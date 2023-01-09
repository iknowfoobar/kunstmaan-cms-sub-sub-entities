<?php

namespace App\Entity\PageParts;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: 'app_text_page_parts')]
class TextPagePart extends AbstractPagePart
{
    /**
     * @var string|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'text', nullable: true)]
    private $content;

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): TextPagePart
    {
        $this->content = $content;

        return $this;
    }

    public function getDefaultView(): string
    {
        return 'PageParts/TextPagePart/view.html.twig';
    }

    public function getDefaultAdminType(): string
    {
        return \App\Form\PageParts\TextPagePartAdminType::class;
    }
}
