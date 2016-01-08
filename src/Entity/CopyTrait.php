<?php

/**
 * This file is part of the Axstrad library.
 *
 * (c) Dan Kempster <dev@dankempster.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright 2014-2015 Dan Kempster <dev@dankempster.co.uk>
 */

namespace Axstrad\Component\Content\Entity;

use Axstrad\Component\Content\Traits\Copy;

/**
 * Axstrad\Component\Content\Entity\CopyTrait
 *
 * Use requirements:
 *   - Doctrine\ORM\Mapping as ORM
 *
 * @deprecated Will be removed in version 1.0
 */
trait CopyTrait
{
    use Copy;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @var null|string
     */
    protected $copy = null;
}
