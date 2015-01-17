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

namespace Axstrad\Component\Content\Tests\Functional;

/**
 * Axstrad\Component\Content\Tests\Functional\SatisfiesIntroductionInterfaceTest
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 * @subpackage Tests
 * @group functional
 */
class SatisfiesIntroductionInterfaceTest extends \PHPUnit_Framework_TestCase
{
    public function implementInterfaceFixturesProvider()
    {
        return array(

            // Doctrine/ORM
            [$this->getMockForAbstractClass('Axstrad\Component\Content\Orm\CopyIntroduction')],
            [$this->getMockForAbstractClass('Axstrad\Component\Content\Orm\ArticleIntroduction')],
        );
    }

    public function fixtureProvider()
    {
        return array_merge(
            array(
                // Traits
                [$this->getMockForTrait('Axstrad\Component\Content\Traits\CopyIntroduction')],
                [$this->getMockForTrait('Axstrad\Component\Content\Traits\ArticleIntroduction')],
            ),

            // Abstract and Concrete implementations
            $this->implementInterfaceFixturesProvider()
        );
    }

    /**
     * @dataProvider implementInterfaceFixturesProvider
     */
    public function testImplementsIntroductionInterface($fixture)
    {
        return $this->assertInstanceOf(
            'Axstrad\Component\Content\Introduction',
            $fixture
        );
    }

    /**
     * @dataProvider fixtureProvider
     */
    public function testIntroductionIsNullToStart($fixture)
    {
        $this->assertNull(
            $fixture->getIntroduction()
        );
    }

    /**
     * @dataProvider fixtureProvider
     */
    public function testCanSetIntroduction($fixture)
    {
        $fixture->setIntroduction('An introduction.');
        $this->assertEquals(
            'An introduction.',
            $fixture->getIntroduction()
        );
    }

    /**
     * @dataProvider fixtureProvider
     */
    public function testsetIntroductionReturnsSelf($fixture)
    {
        $this->assertSame(
            $fixture,
            $fixture->setIntroduction('foo')
        );
    }

    /**
     * @dataProvider fixtureProvider
     */
    public function testIntroductionIsTypeCastToString($fixture)
    {
        $fixture->setIntroduction(1.1);
        $this->assertSame(
            '1.1',
            $fixture->getIntroduction()
        );
    }

    /**
     * @dataProvider fixtureProvider
     */
    public function testIntroductionCanBeSetToNull($fixture)
    {
        $fixture->setIntroduction('My Introduction');
        $fixture->setIntroduction(null);
        $this->assertNull(
            $fixture->getIntroduction()
        );
    }

    /**
     * @dataProvider fixtureProvider
     * @expectedException Axstrad\Component\Content\Exception\InvalidArgumentException
     */
    public function testsetIntroductionThrowsExceptionIfArgumentIsNotScalar($fixture)
    {
        $fixture->setIntroduction($this);
    }
}
