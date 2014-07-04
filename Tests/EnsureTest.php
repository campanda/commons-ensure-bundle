<?php

/**
 * EnsureBundle
 * Copyright (c) 2014, 20steps Digital Full Service Boutique, All rights reserved.
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3.0 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library.
 */

namespace twentysteps\Commons\EnsureBundle\Tests;

use twentysteps\Commons\EnsureBundle\Ensure;

class Foo {
}

class Bar {
}

/**
 * Tests for the Ensure class.
 */
final class EnsureTests extends \PHPUnit_Framework_TestCase {

    const ENSURE_EXCEPTION = 'twentysteps\Commons\EnsureBundle\EnsureException';

    public function testEnsureNotNull() {
        $value = 'hello world';
        $this->assertEquals('hello world', Ensure::isNotNull($value, 'check'));
    }

    public function testEnsureNotNullFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1 failed');
        Ensure::isNotNull(null, 'check %s failed', 1);
    }

    public function testEnsureNull() {
        $this->assertEquals(null, Ensure::isNull(null, 'check'));
    }

    public function testEnsureNullFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1 failed');
        Ensure::isNull('hello', 'check %s failed', 1);
    }

    public function testEnsureEmpty() {
        $this->assertEquals('', Ensure::isEmpty('', 'check'));
        $this->assertEquals(null, Ensure::isEmpty(null, 'check'));
        $this->assertEquals(array(), Ensure::isEmpty(array(), 'check'));
    }

    public function testEnsureEmptyFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1 failed');
        Ensure::isEmpty('hello', 'check %s failed', 1);
    }

    public function testEnsureNotEmpty() {
        $this->assertEquals('hello', Ensure::isNotEmpty('hello', 'check %s', 1));
        $this->assertEquals(array('hello'), Ensure::isNotEmpty(array('hello'), 'check %s', 1));
        $this->assertEquals(1, Ensure::isNotEmpty(1, 'check %s', 1));
    }

    public function testEnsureNotEmptyFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::isNotEmpty('', 'check %s', 1);
    }


    public function testEnsureTrue() {
        $this->assertEquals(1 == 1, Ensure::isTrue(1 == 1, 'check %s', 1));
    }

    public function testEnsureTrueFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::isTrue(1 == 2, 'check %s', 1);
    }

    public function testEnsureFalse() {
        $this->assertEquals(1 == 2, Ensure::isFalse(1 == 2, 'check %s', 1));
    }

    public function testEnsureFalseFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::isFalse(1 == 1, 'check %s', 1);
    }

    public function testEnsureEquals() {
        $this->assertEquals(1, Ensure::isEqual(1, 1, 'check %s', 1));
    }

    public function testEnsureEqualsFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::isEqual(1, 2, 'check %s', 1);
    }

    public function testEnsureNotEquals() {
        $this->assertEquals(2, Ensure::isNotEqual(1, 2, 'check %s', 1));
    }

    public function testEnsureNotEqualsFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::isNotEqual(1, 1, 'check %s', 1);
    }

    public function testEnsureGreaterThan() {
        $this->assertEquals(2, Ensure::isGreaterThan(1, 2, 'check %s', 1));
    }

    public function testEnsureGreaterThanFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::isGreaterThan(1, 1, 'check %s', 1);
    }

    public function testEnsureGreaterThanOrEqual() {
        $this->assertEquals(2, Ensure::isGreaterThanOrEqual(1, 2, 'check %s', 1));
        $this->assertEquals(1, Ensure::isGreaterThanOrEqual(1, 1, 'check %s', 1));
    }

    public function testEnsureGreaterThanOrEqualFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::isGreaterThanOrEqual(1, 0, 'check %s', 1);
    }

    public function testEnsureLessThan() {
        $this->assertEquals(1, Ensure::isLessThan(2, 1, 'check %s', 1));
    }

    public function testEnsureLessThanFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::isLessThan(1, 1, 'check %s', 1);
    }

    public function testEnsureLessThanOrEqual() {
        $this->assertEquals(1, Ensure::isLessThanOrEqual(2, 1, 'check %s', 1));
        $this->assertEquals(1, Ensure::isLessThanOrEqual(1, 1, 'check %s', 1));
    }

    public function testEnsureLessThanOrEqualFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::isLessThanOrEqual(1, 2, 'check %s', 1);
    }

    public function testEnsureInstanceOf() {
        $a = new Foo();
        $this->assertEquals($a, Ensure::isInstanceOf('twentysteps\Commons\EnsureBundle\Tests\Foo', $a, 'check %s', 1));
    }

    public function testEnsureInstanceOfFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        $a = new Bar();
        $this->assertEquals($a, Ensure::isInstanceOf('twentysteps\Commons\EnsureBundle\Tests\Foo', $a, 'check %s', 1));
    }


    public function testEnsureNotInstanceOf() {
        $a = new Bar();
        $this->assertEquals($a, Ensure::isNotInstanceOf('twentysteps\Commons\EnsureBundle\Tests\Foo', $a, 'check %s', 1));
    }

    public function testEnsureNotInstanceOfFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        $a = new Foo();
        Ensure::isNotInstanceOf('twentysteps\Commons\EnsureBundle\Tests\Foo', $a, 'check %s', 1);
    }

    public function testFail() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::fail('check %s', 1);
    }
}