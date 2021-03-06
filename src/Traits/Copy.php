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
 * Axstrad\Component\Content\Traits\Copy
 *
 * Property requirements
 *   - $copy = null
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 * @since 0.3
 */
trait Copy
{
    /**
     * Set Copy
     *
     * @param string $copy
     * @return self
     */
    public function setCopy($copy = null)
    {
        if (is_null($copy)) {
            /** @noinspection PhpUndefinedFieldInspection */
            $this->copy = null;
        }
        elseif (!is_scalar($copy)) {
            throw InvalidArgumentException::create(
                'string (or scalar)',
                $copy
            );
        }
        else {
            /** @noinspection PhpUndefinedFieldInspection */
            $this->copy = (string) $copy;
        }
        return $this;
    }

    /**
     * Get copy
     *
     * @return string
     */
    public function getCopy()
    {
        /** @noinspection PhpUndefinedFieldInspection */
        return $this->copy;
    }
}
