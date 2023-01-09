<?php

namespace App\Entity\PageParts;

use Doctrine\ORM\Mapping as ORM;
use Kunstmaan\MediaBundle\Entity\Media;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: 'app_video_page_parts')]
class VideoPagePart extends AbstractPagePart
{
    /**
     * @var Media|null
     */
    #[Assert\NotNull]
    #[ORM\ManyToOne(targetEntity: Media::class)]
    #[ORM\JoinColumn(name: 'video_media_id', referencedColumnName: 'id')]
    protected $video;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'caption', type: 'string', nullable: true)]
    protected $caption;

    /**
     * @var Media|null
     */
    #[ORM\ManyToOne(targetEntity: Media::class)]
    #[ORM\JoinColumn(name: 'thumbnail_media_id', referencedColumnName: 'id')]
    protected $thumbnail;

    public function setCaption(?string $caption): void
    {
        $this->caption = $caption;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setThumbnail(?Media $thumbnail): void
    {
        $this->thumbnail = $thumbnail;
    }

    public function getThumbnail(): ?Media
    {
        return $this->thumbnail;
    }

    public function setVideo(?Media $video): void
    {
        $this->video = $video;
    }

    public function getVideo(): ?Media
    {
        return $this->video;
    }

    public function getDefaultView(): string
    {
        return 'PageParts/VideoPagePart/view.html.twig';
    }

    public function getDefaultAdminType(): string
    {
        return \App\Form\PageParts\VideoPagePartAdminType::class;
    }
}
