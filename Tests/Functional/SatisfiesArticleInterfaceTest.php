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
 * Axstrad\Component\Content\Tests\Functional\SatisfiesArticleInterfaceTest
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 * @subpackage Tests
 * @group functional
 */
class SatisfiesArticleInterfaceTest extends SatisfiesCopyInterfaceTest
{
    public function fixtureProvider()
    {
        return array(

            // Traits
            [$this->getMockForTrait('Axstrad\Component\Content\Traits\Article')],
            [$this->getMockForTrait('Axstrad\Component\Content\Traits\ArticleIntroduction')],

            // Model
            [new Model\Article],

            // Doctrine/ORM
            [$this->getMockForAbstractClass('Axstrad\Component\Content\Orm\Article')],
            [$this->getMockForAbstractClass('Axstrad\Component\Content\Orm\ArticleIntroduction')],
        );
    }

    public function classNameProvider()
    {
        return array(
            // Model
            ['Axstrad\Component\Content\Model\Article'],

            // Doctrine/ORM
            ['Axstrad\Component\Content\Orm\Article'],
            ['Axstrad\Component\Content\Orm\ArticleIntroduction'],
        );
    }

    /**
     * @dataProvider classNAmeProvider
     */
    public function testImplementsIntroductionInterface($fixture)
    {
        return $this->assertTrue(
            is_a($fixture, 'Axstrad\Component\Content\Article', true),
            sprintf(
                '%s doesn\'t implement the %s interface',
                $fixture,
                'Axstrad\Component\Content\Article'
            )
        );
    }

    /**
     * @dataProvider fixtureProvider
     */
    public function testCanSetHeading($fixture)
    {
        $fixture->setHeading('A New Heading.');
        $this->assertEquals(
            'A New Heading.',
            $fixture->getHeading()
        );
    }

    /**
     * @dataProvider fixtureProvider
     */
    public function testSetHeadingReturnsSelf($fixture)
    {
        $this->assertSame(
            $fixture,
            $fixture->setHeading('')
        );
    }

    /**
     * @dataProvider fixtureProvider
     */
    public function testHeadingIsTypeCastToString($fixture)
    {
        $fixture->setHeading(1.1);
        $this->assertSame(
            '1.1',
            $fixture->getHeading()
        );
    }

    /**
     * @dataProvider fixtureProvider
     */
    public function testNullIsTypeCastToString($fixture)
    {
        $fixture->setHeading(null);
        $this->assertSame(
            '',
            $fixture->getHeading()
        );
    }
}
