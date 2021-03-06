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

/**
 * Axstrad\Bundle\ContentBundle\Traits\Introduction
 *
 * Property requirements
 *   - $introduction = null
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 * @since 0.3
 */
trait Introduction
{
    /**
     * Set introduction
     *
     * @param null|string $introduction
     * @return self
     */
    public function setIntroduction($introduction = null)
    {
        if ($introduction === null) {
            /** @noinspection PhpUndefinedFieldInspection */
            $this->introduction = null;
        }
        elseif (!is_scalar($introduction)) {
            throw InvalidArgumentException::create(
                'null or string',
                $introduction
            );
        }
        else {
            /** @noinspection PhpUndefinedFieldInspection */
            $this->introduction = (string) $introduction;
        }
        return $this;
    }

    /**
     * Get introduction
     *
     * @return null|string
     */
    public function getIntroduction()
    {
        /** @noinspection PhpUndefinedFieldInspection */
        return $this->introduction;
    }
}
