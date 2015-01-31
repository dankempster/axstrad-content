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

use Axstrad\Component\Content\Exception\InvalidArgumentException;
use Axstrad\Component\Content\Tests\Stubs\Traits\IntroductionTraitStub;

/**
 * Axstrad\Component\Content\Tests\Unit\Traits\IntroductionTest
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 * @subpackage Tests
 * @group unit
 */
class IntroductionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var IntroductionTraitStub
     */
    protected $fixture;

    public function setUp()
    {
        $this->fixture = new IntroductionTraitStub;
    }

    /**
     * @covers Axstrad\Component\Content\Traits\Introduction::getIntroduction
     */
    public function testGetIntroductionMethod1()
    {
        $this->assertNull(
            $this->fixture->getIntroduction()
        );
    }

    /**
     * @covers Axstrad\Component\Content\Traits\Introduction::setIntroduction
     */
    public function testCanSetIntroduction()
    {
        $this->fixture->setIntroduction('An introduction.');
        $this->assertAttributeEquals(
            'An introduction.',
            'introduction',
            $this->fixture
        );
    }

    /**
     * @covers Axstrad\Component\Content\Traits\Introduction::getIntroduction
     * @depends testCanSetIntroduction
     * @uses Axstrad\Component\Content\Traits\Introduction::setIntroduction
     */
    public function testGetIntroductionMethod2()
    {
        $this->fixture->setIntroduction('My Introduction');
        $this->assertEquals(
            'My Introduction',
            $this->fixture->getIntroduction()
        );
    }

    /**
     * @covers Axstrad\Component\Content\Traits\Introduction::setIntroduction
     */
    public function testSetIntroductionReturnsSelf()
    {
        $this->assertSame(
            $this->fixture,
            $this->fixture->setIntroduction('foo')
        );
    }

    /**
     * @covers Axstrad\Component\Content\Traits\Introduction::setIntroduction
     * @depends testCanSetIntroduction
     */
    public function testCopyIsTypeCastToString()
    {
        $this->fixture->setIntroduction(1.1);
        $this->assertAttributeEquals(
            '1.1',
            'introduction',
            $this->fixture
        );
    }

    /**
     * @covers Axstrad\Component\Content\Traits\Introduction::setIntroduction
     * @depends testCanSetIntroduction
     */
    public function testCopyCanBeSetToNull()
    {
        $this->fixture->setIntroduction('My Introduction');
        $this->fixture->setIntroduction(null);
        $this->assertAttributeEquals(
            null,
            'introduction',
            $this->fixture
        );
    }

    /**
     * @expectedException InvalidArgumentException
     * @covers Axstrad\Component\Content\Traits\Introduction::setIntroduction
     */
    public function testSetIntroductionThrowsExceptionIfArgumentIsNotScalar()
    {
        $this->fixture->setIntroduction($this);
    }
}
