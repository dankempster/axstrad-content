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

use Axstrad\Component\Content\Copy;
use Axstrad\Component\Content\Entity;
use Axstrad\Component\Content\Exception\InvalidArgumentException;
use Axstrad\Component\Content\Model;
use Axstrad\Component\Content\Tests\Stubs\Traits\CopyBasedIntroductionTraitStub;
use Axstrad\Component\Content\Tests\Stubs\Traits\CopyTraitStub;

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
            [new CopyTraitStub()],
            [new CopyBasedIntroductionTraitStub()],

            // Model
            [new Model\Article],
            [new Model\ArticleIntroduction],
            [new Model\Copy],

            // Doctrine/ORM Traits
            [$this->getMockForTrait('Axstrad\Component\Content\Entity\CopyTrait')],
            [$this->getMockForTrait('Axstrad\Component\Content\Entity\CopyBasedIntroductionTrait')],

            // Doctrine/ORM
            [new Entity\Copy],
            [new Entity\ArticleIntroduction()],
            [new Entity\Article()],
        );
    }

    public function classNameProvider()
    {
        return array(
            // Model
            ['Axstrad\Component\Content\Model\Copy'],
            ['Axstrad\Component\Content\Model\Article'],

            // Doctrine/ORM
            ['Axstrad\Component\Content\Entity\Copy'],
            ['Axstrad\Component\Content\Entity\Article'],
            ['Axstrad\Component\Content\Entity\ArticleIntroduction'],
        );
    }

    /**
     * @dataProvider classNameProvider
     * @param Copy $fixture
     */
    public function testImplementsCopyInterface($fixture)
    {
        $this->assertTrue(
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
     * @param Copy $fixture
     */
    public function testCopyIsNullToStart($fixture)
    {
        $this->assertNull(
            $fixture->getCopy()
        );
    }
    /**
     * @dataProvider fixtureProvider
     * @param Copy $fixture
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
     * @param Copy $fixture
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
     * @param Copy $fixture
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
     * @param Copy $fixture
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
     * @expectedException InvalidArgumentException
     * @dataProvider fixtureProvider
     * @param Copy $fixture
     */
    public function testSetCopyThrowsExceptionIfArgumentIsNotScalar($fixture)
    {
        $fixture->setCopy($this);
    }
}
