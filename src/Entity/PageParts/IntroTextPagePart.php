<?php

namespace App\Entity\PageParts;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: 'app_intro_text_page_parts')]
class IntroTextPagePart extends AbstractPagePart
{
    /**
     * @var string|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'content', type: 'text')]
    private $content;

    public function setContent(?string $content): IntroTextPagePart
    {
        $this->content = $content;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function getDefaultView(): string
    {
        return 'PageParts/IntroTextPagePart/view.html.twig';
    }

    public function getDefaultAdminType(): string
    {
        return \App\Form\PageParts\IntroTextPagePartAdminType::class;
    }
}
