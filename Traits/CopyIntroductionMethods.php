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
 * Axstrad\Bundle\ContentBundle\Traits\CopyIntroductionMethods
 *
 * Property requirements
 *   - $copy = null
 *   - $introduction = null
 *   - $copyIntroWordCount = <integer>
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 * @since 0.3
 */
trait CopyIntroductionMethods
{
    use IntroductionMethods {
        IntroductionMethods::getIntroduction as private internalGetIntroduction;
    }

    /**
     * @return null|string The copy to trim down if an article isn't set
     */
    public abstract function getCopy();

    /**
     * Get introduction
     *
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
