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

use Axstrad\Component\Content\Introduction as IntroductionInterface;
use Axstrad\Component\Content\Traits;

/**
 * Axstrad\Bundle\ContentBundle\Model\Copy
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 * @since 0.4
 */
class CopyIntroduction extends Copy implements
    IntroductionInterface
{
    use Traits\Introduction {
        Traits\Introduction::getIntroduction as private internalGetIntroduction;
    }

    /**
     * Require by Traits\Introduction
     *
     * @var null|string The article introduction
     */
    protected $introduction = null;

    /**
     * Require by Traits\Introduction
     *
     * @var integer $copyIntroWordCount When an introduction is not set, this is
     *      the number of words to trim {@see getCopy copy} to, to create the
     *      introduction.
     */
    protected $copyIntroWordCount = 30;

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
