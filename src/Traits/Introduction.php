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

use Doctrine\ORM\Mapping as ORM;

/**
 * Axstrad\Bundle\ContentBundle\Traits\Introduction
 *
 * Use requirements:
 *   - Doctrine\ORM\Mapping as ORM
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 * @since 0.2
 */
trait Introduction
{
    use IntroductionMethods;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @var null|string $introduction
     */
    protected $introduction = null;
}
