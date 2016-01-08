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

use Axstrad\Component\Content\Entity;
use Axstrad\Component\Content\Exception\InvalidArgumentException;
use Axstrad\Component\Content\Introduction;
use Axstrad\Component\Content\Model;
use Axstrad\Component\Content\Tests\Stubs\Traits\CopyBasedIntroductionTraitStub;
use Axstrad\Component\Content\Tests\Stubs\Traits\IntroductionTraitStub;

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
    /**
     * @return array
     */
    public function fixtureProvider()
    {
        return array(

            // Traits
            [new IntroductionTraitStub()],
            [new CopyBasedIntroductionTraitStub()],

            // Model
            [new Model\ArticleIntroduction],

            // Doctrine/ORM
            [new Entity\ArticleIntroduction],
        );
    }

    /**
     * @return array
     */
    public function classNameProvider()
    {
        return array(
            // Model
            ['Axstrad\Component\Content\Model\ArticleIntroduction'],

            // Doctrine/ORM
            ['Axstrad\Component\Content\Entity\ArticleIntroduction'],
        );
    }

    /**
     * @dataProvider classNAmeProvider
     * @param Introduction $fixture
     */
    public function testImplementsIntroductionInterface($fixture)
    {
        $this->assertTrue(
            is_a($fixture, 'Axstrad\Component\Content\Introduction', true),
            sprintf(
                '%s doesn\'t implement the %s interface',
                $fixture,
                'Axstrad\Component\Content\Introduction'
            )
        );
    }

    /**
     * @dataProvider fixtureProvider
     * @param Introduction $fixture
     */
    public function testIntroductionIsNullToStart($fixture)
    {
        $this->assertNull(
            $fixture->getIntroduction()
        );
    }

    /**
     * @dataProvider fixtureProvider
     * @param Introduction $fixture
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
     * @param Introduction $fixture
     */
    public function testSetIntroductionReturnsSelf($fixture)
    {
        $this->assertSame(
            $fixture,
            $fixture->setIntroduction('foo')
        );
    }

    /**
     * @dataProvider fixtureProvider
     * @param Introduction $fixture
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
     * @param Introduction $fixture
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
     * @expectedException InvalidArgumentException
     * @param Introduction $fixture
     */
    public function testSetIntroductionThrowsExceptionIfArgumentIsNotScalar($fixture)
    {
        $fixture->setIntroduction($this);
    }
}
