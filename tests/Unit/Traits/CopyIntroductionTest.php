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

namespace Axstrad\Component\Content\Tests\Unit\Traits;

use Axstrad\Component\Test\TestCase;

/**
 * Axstrad\Component\Content\Tests\Unit\Traits\CopyIntroductionTest
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 * @subpackage Tests
 * @group unit
 */
class CopyIntroductionTest extends TestCase
{
    public function setUp()
    {
        $this->fixture = $this->getMockForTrait('Axstrad\Component\Content\Traits\CopyIntroduction');
    }

    public function testCopyIsUsedWhenIntroIsNotSet()
    {
        $this->fixture->setCopy(
            "Lorem ipsum Eu nostrud dolor reprehenderit consectetur Duis dolore labore incididunt enim ut aliqua enim ut Duis occaecat nulla in sit qui quis laboris commodo cillum officia reprehenderit ex minim consequat cillum sit veniam aliqua magna sint officia ullamco pariatur.".
            "Sed do in pariatur Ut labore ut sint Excepteur quis eu consectetur veniam sed exercitation fugiat quis sit exercitation ex ut et mollit magna in dolor aute in ut amet aute enim aute minim aute magna enim amet eu."
        );

        $this->assertEquals(
            "Lorem ipsum Eu nostrud dolor reprehenderit consectetur Duis dolore labore incididunt enim ut aliqua enim ut Duis occaecat nulla in sit qui quis laboris commodo cillum officia reprehenderit ex minim...",
            $this->fixture->getIntroduction()
        );
    }

    public function testIntroducitonEllipseCanBeSet()
    {
        $this->fixture->setCopy(
            "Lorem ipsum Eu nostrud dolor reprehenderit consectetur Duis dolore labore incididunt enim ut aliqua enim ut Duis occaecat nulla in sit qui quis laboris commodo cillum officia reprehenderit ex minim consequat cillum sit veniam aliqua magna sint officia ullamco pariatur.".
            "Sed do in pariatur Ut labore ut sint Excepteur quis eu consectetur veniam sed exercitation fugiat quis sit exercitation ex ut et mollit magna in dolor aute in ut amet aute enim aute minim aute magna enim amet eu."
        );

        $this->assertEquals(
            "Lorem ipsum Eu nostrud dolor reprehenderit consectetur Duis dolore labore incididunt enim ut aliqua enim ut Duis occaecat nulla in sit qui quis laboris commodo cillum officia reprehenderit ex minim!!!",
            $this->fixture->getIntroduction('!!!')
        );
    }

    public function testCopyIsReturnedWhenShorterThenIntroWordCount()
    {
        $this->fixture->setCopy(
            "Lorem ipsum Deserunt sit ullamco proident dolor qui ex cillum adipisicing sunt deserunt ullamco in magna exercitation mollit."
        );

        $this->assertEquals(
            "Lorem ipsum Deserunt sit ullamco proident dolor qui ex cillum adipisicing sunt deserunt ullamco in magna exercitation mollit.",
            $this->fixture->getIntroduction()
        );
    }
}
