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
 * Axstrad\Bundle\ContentBundle\Traits\CopyIntroduction
 *
 * Use requirements:
 *   - Doctrine\ORM\Mapping as ORM
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 * @since 0.2
 */
trait CopyIntroduction
{
    use Copy;
    use Introduction;
    use CopyIntroductionMethods {
        CopyIntroductionMethods::getIntroduction insteadof Introduction;
        CopyIntroductionMethods::setIntroduction insteadof Introduction;
    }

    /**
     * @var integer $copyIntroWordCount When an introduction is not set, this is
     *      the number of words to trim {@see getCopy copy} to, to create the
     *      introduction.
     */
    protected $copyIntroWordCount = 30;
}
