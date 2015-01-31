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

/**
 * Axstrad\Bundle\ContentBundle\Traits\Heading
 *
 * Property requirements
 *   - $heading = ""
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 * @since 0.3
 */
trait Heading
{
    /**
     * Set heading
     *
     * @param string $heading
     * @return self
     */
    public function setHeading($heading)
    {
        /** @noinspection PhpUndefinedFieldInspection */
        $this->heading = (string) $heading;
        return $this;
    }

    /**
     * Get heading
     *
     * @return string
     */
    public function getHeading()
    {
        /** @noinspection PhpUndefinedFieldInspection */
        return $this->heading;
    }
}
