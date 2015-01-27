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

namespace Axstrad\Component\Content\Tests\Unit\Model;

use Axstrad\Component\Content\Model\Article;
use Axstrad\Component\Test\TestCase;

/**
 * Axstrad\Component\Content\Tests\Unit\Model\ArticleTest
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/Content
 * @subpackage Tests
 * @group unit
 */
class ArticleTest extends TestCase
{
    public function setUp()
    {
        $this->fixture = new Article;
    }

    /**
     */
    public function testCopyIsNullToStart()
    {
        $this->assertAttributeEquals(
            null,
            'copy',
            $this->fixture
        );
    }

    /**
     * @covers Axstrad\Component\Content\Model\Article::setHeading
     */
    public function testCanSetHeading()
    {
        $this->fixture->setHeading('A New Heading.');
        $this->assertAttributeEquals(
            'A New Heading.',
            'heading',
            $this->fixture
        );
    }

    /**
     * @covers Axstrad\Component\Content\Model\Article::setHeading
     */
    public function testSetHeadingReturnsSelf()
    {
        $this->assertSame(
            $this->fixture,
            $this->fixture->setHeading('')
        );
    }

    /**
     * @covers Axstrad\Component\Content\Model\Article::getHeading
     * @depends testCanSetHeading
     * @uses Axstrad\Component\Content\Model\Article::setHeading
     */
    public function testGetHeadingMethod()
    {
        $this->fixture->setHeading('A Another Heading.');
        $this->assertSame(
            'A Another Heading.',
            $this->fixture->getHeading()
        );
    }
}
