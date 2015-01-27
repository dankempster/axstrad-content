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

namespace Axstrad\Component\Content\Traits;

use Axstrad\Component\Content\Exception\InvalidArgumentException;
use Doctrine\ORM\Mapping as ORM;

/**
 * Axstrad\Component\Content\Traits\Copy
 *
 * Use requirements:
 *   - Doctrine\ORM\Mapping as ORM
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 */
trait Copy
{
    use CopyMethods;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @var null|string $copy The copy
     */
    protected $copy = null;
}
