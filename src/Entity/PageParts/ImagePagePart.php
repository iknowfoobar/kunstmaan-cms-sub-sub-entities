<?php

namespace App\Entity\PageParts;

use Doctrine\ORM\Mapping as ORM;
use Kunstmaan\MediaBundle\Entity\Media;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: 'app_image_page_parts')]
class ImagePagePart extends AbstractPagePart
{
    /**
     * @var Media|null
     */
    #[Assert\NotNull]
    #[ORM\ManyToOne(targetEntity: Media::class)]
    #[ORM\JoinColumn(name: 'media_id', referencedColumnName: 'id')]
    private $media;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'caption', type: 'string', nullable: true)]
    private $caption;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'alt_text', type: 'string', nullable: true)]
    private $altText;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'link', type: 'string', nullable: true)]
    private $link;

    /**
     * @var bool
     */
    #[ORM\Column(name: 'open_in_new_window', type: 'boolean', nullable: true)]
    private $openInNewWindow = false;

    public function getOpenInNewWindow(): bool
    {
        return $this->openInNewWindow;
    }

    public function setOpenInNewWindow(bool $openInNewWindow): ImagePagePart
    {
        $this->openInNewWindow = $openInNewWindow;

        return $this;
    }

    public function setLink(?string $link): ImagePagePart
    {
        $this->link = $link;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setAltText(?string $altText): ImagePagePart
    {
        $this->altText = $altText;

        return $this;
    }

    public function getAltText(): ?string
    {
        return $this->altText;
    }

    public function getMedia(): ?Media
    {
        return $this->media;
    }

    public function setMedia(?Media $media): ImagePagePart
    {
        $this->media = $media;

        return $this;
    }

    public function setCaption(?string $caption): ImagePagePart
    {
        $this->caption = $caption;

        return $this;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function getDefaultView(): string
    {
        return 'PageParts/ImagePagePart/view.html.twig';
    }

    public function getDefaultAdminType(): string
    {
        return \App\Form\PageParts\ImagePagePartAdminType::class;
    }
}
