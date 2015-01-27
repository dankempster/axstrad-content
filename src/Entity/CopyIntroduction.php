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

use Axstrad\Component\Content\Model\CopyIntroduction as BaseCopyIntroduction;
use Doctrine\ORM\Mapping as ORM;

/**
 * Axstrad\Component\Content\Entity\CopyIntroduction
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 * @subpackage ORM
 * @since 0.3
 */
class CopyIntroduction extends BaseCopyIntroduction
{
    use Traits\EntityTrait;
    use Traits\CopyTrait;
    use Traits\IntroductionTrait;
}
