<?php

namespace Axstrad\Component\Content\Entity\Traits;

use Axstrad\Component\Content\Traits\Heading;

/**
 * Axstrad\Component\Content\Entity\Traits\HeadingTrait
 *
 * Use requirements:
 *   - Doctrine\ORM\Mapping as ORM
 *   - Doctrine\ORM\Mapping as ORM
 */
trait HeadingTrait
{
    use Heading;

    /**
     * @ORM\Column(type="text", length=255, nullable=true)
     * @var null|string
     */
    protected $heading = null;
}
