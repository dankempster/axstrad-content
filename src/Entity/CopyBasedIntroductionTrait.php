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

namespace Axstrad\Component\Content\Entity;

use Axstrad\Component\Content\Traits\CopyBasedIntroduction;

/**
 * Axstrad\Component\Content\Entity\CopyBasedIntroductionTrait
 *
 * Use requirements:
 *   - Doctrine\ORM\Mapping as ORM
 *
 * @deprecated Will be removed in version 1.0
 */
trait CopyBasedIntroductionTrait
{
    use CopyTrait;
    use IntroductionTrait;
    use CopyBasedIntroduction {
        CopyBasedIntroduction::getIntroduction insteadof IntroductionTrait;
        CopyBasedIntroduction::setIntroduction insteadof IntroductionTrait;
        CopyBasedIntroduction::getCopy insteadof CopyTrait;
        CopyBasedIntroduction::setCopy insteadof CopyTrait;
    }

    /**
     * Require by Traits\Introduction
     *
     * @var integer $copyIntroWordCount When an introduction is not set, this is
     *      the number of words to trim {@see getCopy copy} to, to create the
     *      introduction.
     */
    protected $copyIntroWordCount = 30;
}
