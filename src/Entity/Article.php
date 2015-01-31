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

use Axstrad\Component\Content\Article as ArticleInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Axstrad\Component\Content\Entity\Article
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 * @subpackage ORM
 * @since 0.3
 * @ORM\MappedSuperclass
 */
class Article implements
    ArticleInterface
{
    use EntityTrait;
    use CopyTrait;
    use HeadingTrait;
}
