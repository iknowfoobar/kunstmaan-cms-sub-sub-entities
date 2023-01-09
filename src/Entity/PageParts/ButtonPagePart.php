<?php

namespace App\Entity\PageParts;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: 'app_button_page_parts')]
class ButtonPagePart extends AbstractPagePart
{
    /**
     * @var string|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'link_text', type: 'string', length: 255, nullable: true)]
    private $linkText;

    /**
     * @var string|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'link_url', type: 'string', nullable: true)]
    private $linkUrl;

    /**
     * @var bool
     */
    #[ORM\Column(name: 'link_new_window', type: 'boolean', nullable: true)]
    private $linkNewWindow = false;

    /**
     * @var string|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'type', type: 'string', length: 15, nullable: true)]
    private $type;

    /**
     * @var string|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'size', type: 'string', length: 15, nullable: true)]
    private $size;

    /**
     * @var string|null
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: 'position', type: 'string', length: 15, nullable: true)]
    private $position;

    public const TYPE_PRIMARY = 'primary';
    public const TYPE_SECONDARY = 'secondary';
    public const TYPE_TERTIARY = 'tertiary';
    public const TYPE_QUATERNARY = 'quaternary';
    public const TYPE_LINK = 'link';

    public const SIZE_EXTRA_LARGE = 'xl';
    public const SIZE_LARGE = 'lg';
    public const SIZE_DEFAULT = 'default';
    public const SIZE_SMALL = 'sm';
    public const SIZE_EXTRA_SMALL = 'xs';

    public const POSITION_LEFT = 'left';
    public const POSITION_CENTER = 'center';
    public const POSITION_RIGHT = 'right';
    public const POSITION_BLOCK = 'block';

    /**
     * @var array Supported types
     */
    public static $types = [
        self::TYPE_PRIMARY,
        self::TYPE_SECONDARY,
        self::TYPE_TERTIARY,
        self::TYPE_QUATERNARY,
        self::TYPE_LINK,
    ];

    /**
     * @var array Supported sizes
     */
    public static $sizes = [
        self::SIZE_EXTRA_LARGE,
        self::SIZE_LARGE,
        self::SIZE_DEFAULT,
        self::SIZE_SMALL,
        self::SIZE_EXTRA_SMALL,
    ];

    /**
     * @var array Supported positions
     */
    public static $positions = [
        self::POSITION_LEFT,
        self::POSITION_CENTER,
        self::POSITION_RIGHT,
        self::POSITION_BLOCK,
    ];

    public function __construct()
    {
        $this->type = self::TYPE_PRIMARY;
        $this->size = self::SIZE_DEFAULT;
        $this->position = self::POSITION_LEFT;
    }

    public function setLinkNewWindow(bool $linkNewWindow): ButtonPagePart
    {
        $this->linkNewWindow = $linkNewWindow;

        return $this;
    }

    public function isLinkNewWindow(): bool
    {
        return $this->linkNewWindow;
    }

    public function setLinkText(?string $linkText): ButtonPagePart
    {
        $this->linkText = $linkText;

        return $this;
    }

    public function getLinkText(): ?string
    {
        return $this->linkText;
    }

    public function setLinkUrl(?string $linkUrl): ButtonPagePart
    {
        $this->linkUrl = $linkUrl;

        return $this;
    }

    public function getLinkUrl(): ?string
    {
        return $this->linkUrl;
    }

    public function setType(?string $type): ButtonPagePart
    {
        if (!in_array($type, self::$types, true)) {
            throw new \InvalidArgumentException("Type $type not supported");
        }
        $this->type = $type;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setSize(?string $size): ButtonPagePart
    {
        if (!in_array($size, self::$sizes, true)) {
            throw new \InvalidArgumentException("Size $size not supported");
        }
        $this->size = $size;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setPosition(?string $position): ButtonPagePart
    {
        if (!in_array($position, self::$positions, true)) {
            throw new \InvalidArgumentException("Position $position not supported");
        }
        $this->position = $position;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function getDefaultView(): string
    {
        return 'PageParts/ButtonPagePart/view.html.twig';
    }

    public function getDefaultAdminType(): string
    {
        return \App\Form\PageParts\ButtonPagePartAdminType::class;
    }
}
