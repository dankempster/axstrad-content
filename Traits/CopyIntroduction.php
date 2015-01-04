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
 * Axstrad\Bundle\ContentBundle\Traits\Article
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 */
trait CopyIntroduction
{
    use Copy;
    use Introduction {
        Introduction::getIntroduction as protected internalGetIntroduction;
    }

    /**
     * @var integer
     */
    protected $introWordCount = 30;

    /**
     * Get introduction
     *
     * @return string
     */
    public function getIntroduction($ellipse = "...")
    {
        $intro = $this->internalGetIntroduction();

        if ($intro === null) {
            $copy = strip_tags($this->getCopy());
            $words = explode(" ", trim($copy), $this->introWordCount + 1);
            if (count($words) > $this->introWordCount) {
                array_pop($words);
                $intro = trim(implode(" ", $words)).$ellipse;
            }
            else {
                $intro = $copy;
            }
        }

        return $intro;
    }
}
