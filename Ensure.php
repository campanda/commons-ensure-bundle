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

namespace twentysteps\Commons\EnsureBundle;

/**
 * Static helper for checking code preconditions and throwing an LogicException in the case of
 * errors early with a meaningful message. The message may be generated in sprintf fashion like
 * shown in the following example:
 *
 * Ensure::ensureTrue($user->isValid(), 'user [%s] is not valid', $user->getId());
 */
final class Ensure {

    private function __construct() {
        // no instantiation possible
    }

    /**
     * Fails with the given message if $value is null: $value === null.
     */
    public static function ensureNotNull($value, $format, $args = null, $_ = null) {
        if ($value === null) {
            self::fail($format, $args, $_);
        }
    }

    /**
     * Fails with the given message if $value is not null: $value !== null.
     */
    public static function ensureNull($value, $format, $args = null, $_ = null) {
        if ($value !== null) {
            self::fail($format, $args, $_);
        }
    }

    /**
     * Fails with the given message if $value is not empty: !empty($value).
     */
    public static function ensureEmpty($value, $format, $args = null, $_ = null) {
        if (!empty($value)) {
            self::fail($format, $args, $_);
        }
    }

    /**
     * Fails with the given message if $value is empty: empty($value).
     */
    public static function ensureNotEmpty($value, $format, $args = null, $_ = null) {
        if (empty($value)) {
            self::fail($format, $args, $_);
        }
    }


    /**
     * Fails with the given message if $value is not true: !$value.
     */
    public static function ensureTrue($value, $format, $args = null, $_ = null) {
        if (!$value) {
            self::fail($format, $args, $_);
        }
    }

    /**
     * Fails with the given message if $value is true: $value.
     */
    public static function ensureFalse($value, $format, $args = null, $_ = null) {
        if ($value) {
            self::fail($format, $args, $_);
        }
    }

    /**
     * Fails with the given message if $value not equal: ($expected != $value).
     */
    public static function ensureEquals($expected, $value, $format, $args = null, $_ = null) {
        if ($expected != $value) {
            self::fail($format, $args, $_);
        }
    }

    /**
     * Fails with the given message if $value equal: ($expected != $value).
     */
    public static function ensureNotEquals($expected, $value, $format, $args = null, $_ = null) {
        if ($expected == $value) {
            self::fail($format, $args, $_);
        }
    }

    /**
     * Fails with the given message if $value <= $expected.
     */
    public static function ensureGreaterThan($expected, $value, $format, $args = null, $_ = null) {
        if ($expected >= $value) {
            self::fail($format, $args, $_);
        }
    }

    /**
     * Fails with the given message if $value < $expected.
     */
    public static function ensureGreaterThanOrEqual($expected, $value, $format, $args = null, $_ = null) {
        if ($expected > $value) {
            self::fail($format, $args, $_);
        }
    }

    /**
     * Fails with the given message if $value >= $expected.
     */
    public static function ensureLessThan($expected, $value, $format, $args = null, $_ = null) {
        if ($expected <= $value) {
            self::fail($format, $args, $_);
        }
    }

    /**
     * Fails with the given message if $value > $expected.
     */
    public static function ensureLessThanOrEqual($expected, $value, $format, $args = null, $_ = null) {
        if ($expected < $value) {
            self::fail($format, $args, $_);
        }
    }

    /**
     * Fails with the given message if $value is not instanceof $cl: !($value instanceof $cl).
     */
    public static function ensureInstanceOf($cl, $value, $format, $args = null, $_ = null) {
        if (!($value instanceof $cl)) {
            self::fail($format, $args, $_);
        }
    }


    /**
     * Fails with the given message if $value is instanceof $cl: ($value instanceof $cl).
     */
    public static function ensureNotInstanceOf($cl, $value, $format, $args = null, $_ = null) {
        if ($value instanceof $cl) {
            self::fail($format, $args, $_);
        }
    }

    /**
     * Simply fails with the given message in sprintf format. May be used when
     * the code has reached a point where it shouldn't be, for example the default
     * case of a switch.
     */
    public static function fail($format, $args = null, $_ = null) {
        throw new EnsureException(sprintf($format, $args, $_));
    }
}