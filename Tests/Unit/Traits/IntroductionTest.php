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
 * Axstrad\Component\Content\Tests\Unit\Traits\IntroductionTest
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 * @subpackage Tests
 * @group unit
 */
class IntroductionTest extends TestCase
{
    public function setUp()
    {
        $this->fixture = $this->getMockForTrait('Axstrad\Component\Content\Traits\Introduction');
    }

    /**
     */
    public function testIntroductionIsNullToStart()
    {
        $this->assertAttributeSame(
            null,
            'introduction',
            $this->fixture
        );
    }

    /**
     * @covers Axstrad\Component\Content\Traits\Introduction::getIntroduction
     * @depends testIntroductionIsNullToStart
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
    public function testsetIntroductionReturnsSelf()
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
     * @expectedException Axstrad\Component\Content\Exception\InvalidArgumentException
     * @covers Axstrad\Component\Content\Traits\Introduction::setIntroduction
     */
    public function testsetIntroductionThrowsExceptionIfArgumentIsNotScalar()
    {
        $this->fixture->setIntroduction($this);
    }
}
