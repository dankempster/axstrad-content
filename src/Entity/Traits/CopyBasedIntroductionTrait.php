<?php

namespace Axstrad\Component\Content\Entity\Traits;

use Axstrad\Component\Content\Traits\CopyBasedIntroduction;

/**
 * Axstrad\Component\Content\Entity\Traits\CopyBasedIntroductionTrait
 *
 * Use requirements:
 *   - Doctrine\ORM\Mapping as ORM
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
