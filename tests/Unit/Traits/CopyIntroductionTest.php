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

use Axstrad\Component\Content\Tests\Stubs\Traits\CopyBasedIntroductionTraitStub;
use Axstrad\Component\Content\Traits\CopyBasedIntroduction;

/**
 * Axstrad\Component\Content\Tests\Unit\Model\CopyIntroductionTest
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 * @subpackage Tests
 * @group unit
 */
class CopyIntroductionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CopyBasedIntroduction
     */
    protected $fixture;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->fixture = new CopyBasedIntroductionTraitStub;
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
