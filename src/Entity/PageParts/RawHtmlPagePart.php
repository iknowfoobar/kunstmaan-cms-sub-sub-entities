<?php

namespace App\Entity\PageParts;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: 'app_raw_html_page_parts')]
class RawHtmlPagePart extends AbstractPagePart
{
    /**
     * @var string|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(type: 'text', nullable: true)]
    protected $content;

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): RawHtmlPagePart
    {
        $this->content = $content;

        return $this;
    }

    public function getDefaultView(): string
    {
        return 'PageParts/RawHtmlPagePart/view.html.twig';
    }

    public function getDefaultAdminType(): string
    {
        return \App\Form\PageParts\RawHtmlPagePartAdminType::class;
    }
}
