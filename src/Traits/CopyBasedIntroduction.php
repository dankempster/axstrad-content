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
 *   - $copy = null
 *   - $introduction = null
 *   - $copyIntroWordCount = <integer>
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 * @since 0.4
 */
trait CopyBasedIntroduction
{
    use Copy;
    use Introduction {
        Introduction::getIntroduction as private internalGetIntroduction;
    }


    /**
     * Get introduction.
     *
     * If an introduction hasn't been set, the first {@see $copyIntroWordCount
     * X words} from the {@see getCopy copy} are returned.
     *
     * @param string $ellipse
     * @return string
     */
    public function getIntroduction($ellipse = "...")
    {
        $intro = $this->internalGetIntroduction();

        if ($intro === null && ($copy = $this->getCopy()) !== null) {
            $copy = trim(strip_tags($this->getCopy()));

            if ( ! empty($copy)) {
                $intro = $this->truncateWords($copy, $ellipse);
            }
        }

        return $intro;
    }


    /**
     * @param string $copy
     * @param string $ellipse
     * @return mixed
     */
    protected function truncateWords($copy, $ellipse)
    {
        $words = explode(" ", trim($copy), $this->copyIntroWordCount + 1);
        if (count($words) > $this->copyIntroWordCount) {
            array_pop($words);
            $intro = trim(implode(" ", $words)).$ellipse;
        }
        else {
            $intro = $copy;
        }

        return $intro;
    }
}
