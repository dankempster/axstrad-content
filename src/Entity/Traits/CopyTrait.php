<?php

namespace Axstrad\Component\Content\Entity\Traits;

use Axstrad\Component\Content\Traits\Copy;

/**
 * Axstrad\Component\Content\Entity\Traits\CopyTrait
 *
 * Use requirements:
 *   - Doctrine\ORM\Mapping as ORM
 */
trait CopyTrait
{
    use Copy;

    /**
     * @ORM\Column(type="text", length=255, nullable=true)
     * @var null|string
     */
    protected $copy = null;
}
