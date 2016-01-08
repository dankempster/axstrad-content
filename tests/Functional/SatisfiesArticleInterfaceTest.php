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

use Axstrad\Component\Content\Article;
use Axstrad\Component\Content\Entity;
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

            // Model
            [new Model\Article],
            [new Model\ArticleIntroduction],

            // Doctrine/ORM
            [new Entity\Article],
            [new Entity\ArticleIntroduction],
        );
    }

    public function classNameProvider()
    {
        return array(
            // Model
            ['Axstrad\Component\Content\Model\Article'],
            ['Axstrad\Component\Content\Model\ArticleIntroduction'],

            // Doctrine/ORM
            ['Axstrad\Component\Content\Entity\Article'],
            ['Axstrad\Component\Content\Entity\ArticleIntroduction'],
        );
    }

    /**
     * @dataProvider classNAmeProvider
     * @param Article $fixture
     */
    public function testImplementsArticleInterface($fixture)
    {
        $this->assertTrue(
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
     * @param Article $fixture
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
     * @param Article $fixture
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
     * @param Article $fixture
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
     * @param Article $fixture
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
