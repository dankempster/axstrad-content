<?php

namespace Axstrad\Component\Content\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

/**
 * Axstrad\Component\Content\Entity\Traits\EntityTrait
 *
 * Use requirements:
 *   - Doctrine\ORM\Mapping as ORM
 */
trait EntityTrait
{
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
