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

namespace Axstrad\Component\Content\Tests\Stubs\Traits;

use Axstrad\Component\Content\Traits;

/**
 * Axstrad\Component\Content\Tests\Stubs\Traits\CopyBasedIntroductionTraitStub
 */
class CopyBasedIntroductionTraitStub
{
    use Traits\CopyBasedIntroduction;

    protected $copy = null;
    protected $introduction = null;
    protected $copyIntroWordCount = 30;
}
