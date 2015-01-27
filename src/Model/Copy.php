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

namespace Axstrad\Component\Content\Model;

use Axstrad\Component\Content\Copy as CopyInterface;
use Axstrad\Component\Content\Traits;

/**
 * Axstrad\Bundle\ContentBundle\Model\Copy
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 * @since 0.3
 */
class Copy implements
    CopyInterface
{
    use Traits\Copy;
}
