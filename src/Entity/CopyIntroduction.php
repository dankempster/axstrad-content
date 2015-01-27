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

use Axstrad\Component\Content\Introduction as IntroductionIntrerface;
use Axstrad\Component\Content\Traits\CopyIntroduction as CopyIntroTrait;
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
abstract class CopyIntroduction extends Copy implements
    IntroductionIntrerface
{
    use CopyIntroTrait;

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer
     */
    protected $id;

    /**
     * Get the entity's ID.
     *
     * @return integer Returns the entity's ID.
     */
    public function getId()
    {
        return $this->id;
    }
}