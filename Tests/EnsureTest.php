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
        Ensure::ensureNotNull($value, 'check');
    }

    public function testEnsureNotNullFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1 failed');
        Ensure::ensureNotNull(null, 'check %s failed', 1);
    }

    public function testEnsureNull() {
        Ensure::ensureNull(null, 'check');
    }

    public function testEnsureNullFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1 failed');
        Ensure::ensureNull('hello', 'check %s failed', 1);
    }

    public function testEnsureEmpty() {
        Ensure::ensureEmpty('', 'check');
        Ensure::ensureEmpty(null, 'check');
        Ensure::ensureEmpty(array(), 'check');
    }

    public function testEnsureEmptyFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1 failed');
        Ensure::ensureEmpty('hello', 'check %s failed', 1);
    }

    public function testEnsureNotEmpty() {
        Ensure::ensureNotEmpty('hello', 'check %s', 1);
        Ensure::ensureNotEmpty(array('hello'), 'check %s', 1);
        Ensure::ensureNotEmpty(1, 'check %s', 1);
    }

    public function testEnsureNotEmptyFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::ensureNotEmpty('', 'check %s', 1);
    }


    public function testEnsureTrue() {
        Ensure::ensureTrue(1 == 1, 'check %s', 1);
    }

    public function testEnsureTrueFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::ensureTrue(1 == 2, 'check %s', 1);
    }

    public function testEnsureFalse() {
        Ensure::ensureFalse(1 == 2, 'check %s', 1);
    }

    public function testEnsureFalseFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::ensureFalse(1 == 1, 'check %s', 1);
    }

    public function testEnsureEquals() {
        Ensure::ensureEquals(1, 1, 'check %s', 1);
    }

    public function testEnsureEqualsFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::ensureEquals(1, 2, 'check %s', 1);
    }

    public function testEnsureNotEquals() {
        Ensure::ensureNotEquals(1, 2, 'check %s', 1);
    }

    public function testEnsureNotEqualsFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::ensureNotEquals(1, 1, 'check %s', 1);
    }

    public function testEnsureGreaterThan() {
        Ensure::ensureGreaterThan(1, 2, 'check %s', 1);
    }

    public function testEnsureGreaterThanFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::ensureGreaterThan(1, 1, 'check %s', 1);
    }

    public function testEnsureGreaterThanOrEqual() {
        Ensure::ensureGreaterThanOrEqual(1, 2, 'check %s', 1);
        Ensure::ensureGreaterThanOrEqual(1, 1, 'check %s', 1);
    }

    public function testEnsureGreaterThanOrEqualFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::ensureGreaterThanOrEqual(1, 0, 'check %s', 1);
    }

    public function testEnsureLessThan() {
        Ensure::ensureLessThan(2, 1, 'check %s', 1);
    }

    public function testEnsureLessThanFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::ensureLessThan(1, 1, 'check %s', 1);
    }

    public function testEnsureLessThanOrEqual() {
        Ensure::ensureLessThanOrEqual(2, 1, 'check %s', 1);
        Ensure::ensureLessThanOrEqual(1, 1, 'check %s', 1);
    }

    public function testEnsureLessThanOrEqualFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::ensureLessThanOrEqual(1, 2, 'check %s', 1);
    }

    public function testEnsureInstanceOf() {
        $a = new Foo();
        Ensure::ensureInstanceOf('twentysteps\Commons\EnsureBundle\Tests\Foo', $a, 'check %s', 1);
    }

    public function testEnsureInstanceOfFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        $a = new Bar();
        Ensure::ensureInstanceOf('twentysteps\Commons\EnsureBundle\Tests\Foo', $a, 'check %s', 1);
    }


    public function testEnsureNotInstanceOf() {
        $a = new Bar();
        Ensure::ensureNotInstanceOf('twentysteps\Commons\EnsureBundle\Tests\Foo', $a, 'check %s', 1);
    }

    public function testEnsureNotInstanceOfFailed() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        $a = new Foo();
        Ensure::ensureNotInstanceOf('twentysteps\Commons\EnsureBundle\Tests\Foo', $a, 'check %s', 1);
    }

    public function testFail() {
        $this->setExpectedException(self::ENSURE_EXCEPTION, 'check 1');
        Ensure::fail('check %s', 1);
    }
}