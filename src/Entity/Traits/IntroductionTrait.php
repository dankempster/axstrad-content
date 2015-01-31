<?php

namespace Axstrad\Component\Content\Entity\Traits;

use Axstrad\Component\Content\Traits\Introduction;

/**
 * Axstrad\Component\Content\Entity\Traits\IntroductionTrait
 *
 * Use requirements:
 *   - Doctrine\ORM\Mapping as ORM
 *   - Doctrine\ORM\Mapping as ORM
 */
trait IntroductionTrait
{
    use Introduction;

    /**
     * @ORM\Column(type="text", length=255, nullable=true)
     * @var null|string
     */
    protected $introduction = null;
}
