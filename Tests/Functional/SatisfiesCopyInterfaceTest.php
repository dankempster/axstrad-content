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

use Axstrad\Component\Content\Model;

/**
 * Axstrad\Component\Content\Tests\Functional\SatisfiesCopyInterfaceTest
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 * @subpackage Tests
 * @group functional
 */
class SatisfiesCopyInterfaceTest extends \PHPUnit_Framework_TestCase
{
    public function fixtureProvider()
    {
        return array(

            // Traits
            [$this->getMockForTrait('Axstrad\Component\Content\Traits\Copy')],
            [$this->getMockForTrait('Axstrad\Component\Content\Traits\CopyIntroduction')],

            // Model
            [new Model\Copy],

            // Doctrine/ORM
            [$this->getMockForAbstractClass('Axstrad\Component\Content\Orm\Copy')],
            [$this->getMockForAbstractClass('Axstrad\Component\Content\Orm\CopyIntroduction')],
        );
    }

    public function classNameProvider()
    {
        return array(
            // Model
            ['Axstrad\Component\Content\Model\Copy'],

            // Doctrine/ORM
            ['Axstrad\Component\Content\Orm\Copy'],
            ['Axstrad\Component\Content\Orm\CopyIntroduction'],
        );
    }

    /**
     * @dataProvider classNameProvider
     */
    public function testImplementsCopyInterface($fixture)
    {
        return $this->assertTrue(
            is_a($fixture, 'Axstrad\Component\Content\Copy', true),
            sprintf(
                '%s doesn\'t implement the %s interface',
                $fixture,
                'Axstrad\Component\Content\Copy'
            )
        );
    }

    /**
     * @dataProvider fixtureProvider
     */
    public function testCopyIsNullToStart($fixture)
    {
        $this->assertNull(
            $fixture->getCopy()
        );
    }
    /**
     * @dataProvider fixtureProvider
     */
    public function testCanSetCopy($fixture)
    {
        $fixture->setCopy('Some more copy.');
        $this->assertEquals(
            'Some more copy.',
            $fixture->getCopy()
        );
    }

    /**
     * @dataProvider fixtureProvider
     */
    public function testSetCopyReturnsSelf($fixture)
    {
        $this->assertSame(
            $fixture,
            $fixture->setCopy('foo')
        );
    }

    /**
     * @dataProvider fixtureProvider
     */
    public function testCopyIsTypeCastToString($fixture)
    {
        $fixture->setCopy(1.1);
        $this->assertSame(
            '1.1',
            $fixture->getCopy()
        );
    }

    /**
     * @dataProvider fixtureProvider
     */
    public function testCopyCanBeSetToNull($fixture)
    {
        $fixture->setCopy('My Copy');
        $fixture->setCopy(null);
        $this->assertNull(
            $fixture->getCopy()
        );
    }

    /**
     * @expectedException Axstrad\Component\Content\Exception\InvalidArgumentException
     * @dataProvider fixtureProvider
     */
    public function testSetCopyThrowsExceptionIfArgumentIsNotScalar($fixture)
    {
        $fixture->setCopy($this);
    }
}
