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
use Axstrad\Component\Content\Model;

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
    public function fixtureProvider()
    {
        return array(

            // Model
            [new Model\ArticleIntroduction],
            [new Model\CopyIntroduction],

            // Doctrine/ORM Traits
            [$this->getMockForTrait('Axstrad\Component\Content\Entity\Traits\IntroductionTrait')],
            [$this->getMockForTrait('Axstrad\Component\Content\Entity\Traits\CopyBasedIntroductionTrait')],

            // Doctrine/ORM
            [new Entity\ArticleIntroduction],
            [new Entity\CopyIntroduction],
        );
    }

    public function classNameProvider()
    {
        return array(
            // Model
            ['Axstrad\Component\Content\Model\ArticleIntroduction'],

            // Doctrine/ORM
            ['Axstrad\Component\Content\Entity\CopyIntroduction'],
            ['Axstrad\Component\Content\Entity\ArticleIntroduction'],
        );
    }

    /**
     * @dataProvider classNAmeProvider
     */
    public function testImplementsIntroductionInterface($fixture)
    {
        return $this->assertTrue(
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
