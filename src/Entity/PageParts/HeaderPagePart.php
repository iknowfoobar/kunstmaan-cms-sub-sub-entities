<?php

namespace App\Entity\PageParts;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: 'app_header_page_parts')]
class HeaderPagePart extends AbstractPagePart
{
    /**
     * @var int|null
     */
    #[Assert\NotBlank(message: 'headerpagepart.niv.not_blank')]
    #[ORM\Column(name: 'niv', type: 'integer', nullable: true)]
    private $niv;

    /**
     * @var string
     */
    #[Assert\NotBlank(message: 'headerpagepart.title.not_blank')]
    #[ORM\Column(name: 'title', type: 'string', nullable: true)]
    private $title;

    /**
     * @var array Supported header sizes
     */
    public static $supportedHeaders = [1, 2, 3, 4, 5, 6];

    public function setNiv(?int $niv): HeaderPagePart
    {
        $this->niv = $niv;

        return $this;
    }

    public function getNiv(): ?int
    {
        return $this->niv;
    }

    public function setTitle(?string $title): HeaderPagePart
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getDefaultView(): string
    {
        return 'PageParts/HeaderPagePart/view.html.twig';
    }

    public function getDefaultAdminType(): string
    {
        return \App\Form\PageParts\HeaderPagePartAdminType::class;
    }
}
