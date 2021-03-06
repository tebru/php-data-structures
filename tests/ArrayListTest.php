<?php
/*
 * Copyright (c) Nate Brunette.
 * Distributed under the MIT License (http://opensource.org/licenses/MIT)
 */

namespace Tebru\Collection\Test;

use PHPUnit\Framework\TestCase;
use Tebru\Collection\ArrayList;
use Tebru\Collection\CollectionInterface;

/**
 * Class ArrayListTest
 *
 * @author Nate Brunette <n@tebru.net>
 *
 * @covers \Tebru\Collection\ArrayList
 */
class ArrayListTest extends TestCase
{
    public function testConstructWithoutArgument()
    {
        self::assertInstanceOf(ArrayList::class, new ArrayList());
    }

    public function testConstructWithElements()
    {
        $elements = [1, false, null, new \stdClass()];
        $list = new ArrayList($elements);

        self::assertCount(4, $list);
        self::assertSame($elements[0], $list->get(0));
        self::assertSame($elements[1], $list->get(1));
        self::assertSame($elements[2], $list->get(2));
        self::assertEquals($elements[3], $list->get(3));
    }

    public function testConstructWithAssociativeArray()
    {
        $list = new ArrayList(['foo' => 'bar']);

        self::assertAttributeEquals(['bar'], 'elements', $list);
        self::assertCount(1, $list);
        self::assertSame('bar', $list->get(0));
    }
}

