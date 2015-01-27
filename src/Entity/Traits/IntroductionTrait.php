<?php

namespace Axstrad\Component\Content\Entity\Traits;

/**
 * Axstrad\Component\Content\Entity\Traits\IntroductionTrait
 *
 * Use requirements:
 *   - Doctrine\ORM\Mapping as ORM
 *   - Doctrine\ORM\Mapping as ORM
 */
trait IntroductionTrait
{
    /**
     * @ORM\Column(type="text", length=255, nullable=true)
     * @var null|string
     */
    protected $introduction = null;
}
