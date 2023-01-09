<?php

namespace App\Entity\PageParts;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: 'app_link_page_parts')]
class LinkPagePart extends AbstractPagePart
{
    /**
     * @var string|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'url', type: 'string', nullable: true)]
    private $url;

    /**
     * @var string|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'text', type: 'string', nullable: true)]
    private $text;

    /**
     * @var bool
     */
    #[ORM\Column(name: 'open_in_new_window', type: 'boolean', nullable: true)]
    private $openInNewWindow = false;

    public function setUrl(?string $url): LinkPagePart
    {
        $this->url = $url;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function getOpenInNewWindow(): bool
    {
        return $this->openInNewWindow;
    }

    public function setOpenInNewWindow(bool $openInNewWindow): LinkPagePart
    {
        $this->openInNewWindow = $openInNewWindow;

        return $this;
    }

    public function setText(?string $text): LinkPagePart
    {
        $this->text = $text;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function getDefaultView(): string
    {
        return 'PageParts/LinkPagePart/view.html.twig';
    }

    public function getDefaultAdminType(): string
    {
        return \App\Form\PageParts\LinkPagePartAdminType::class;
    }
}
