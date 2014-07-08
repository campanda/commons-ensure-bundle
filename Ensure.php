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
 * Ensure::isTrue($user->isValid(), 'user [%s] is not valid', $user->getId());
 *
 * All functions do return the checked value, so the check and assignment may occur in one line:
 *
 * $this->name = Ensure::isNotNull($name, 'name must not be null');
 */
final class Ensure {

    private function __construct() {
        // no instantiation possible
    }

    /**
     * Fails with the given message if $value is null: $value === null.
     * @return mixed
     */
    public static function isNotNull($value, $format, $args = null, $_ = null) {
        if ($value === null) {
            self::fail($format, $args, $_);
        }
        return $value;
    }

    /**
     * Fails with the given message if $value is not null: $value !== null.
     * @return mixed
     */
    public static function isNull($value, $format, $args = null, $_ = null) {
        if ($value !== null) {
            self::fail($format, $args, $_);
        }
        return $value;
    }

    /**
     * Fails with the given message if the variable $value is not set or null: !isset($value).
     * @return mixed
     */
    public static function isExisting(&$value, $format, $args = null, $_ = null) {
        if (!isset($value)) {
            self::fail($format, $args, $_);
        }
        return $value;
    }

    /**
     * Fails with the given message if the variable $value is set: isset($value).
     * @return mixed
     */
    public static function isNotExisting(&$value, $format, $args = null, $_ = null) {
        if (isset($value)) {
            self::fail($format, $args, $_);
        }
        return $value;
    }

    /**
     * Fails with the given message if $value is not empty: !empty($value).
     * @return mixed
     */
    public static function isEmpty($value, $format, $args = null, $_ = null) {
        if (!empty($value)) {
            self::fail($format, $args, $_);
        }
        return $value;
    }

    /**
     * Fails with the given message if $value is empty: empty($value).
     * @return mixed
     */
    public static function isNotEmpty($value, $format, $args = null, $_ = null) {
        if (empty($value)) {
            self::fail($format, $args, $_);
        }
        return $value;
    }


    /**
     * Fails with the given message if $value is not true: !$value.
     * @return mixed
     */
    public static function isTrue($value, $format, $args = null, $_ = null) {
        if (!$value) {
            self::fail($format, $args, $_);
        }
        return $value;
    }

    /**
     * Fails with the given message if $value is true: $value.
     * @return mixed
     */
    public static function isFalse($value, $format, $args = null, $_ = null) {
        if ($value) {
            self::fail($format, $args, $_);
        }
        return $value;
    }

    /**
     * Fails with the given message if $value not equal: ($expected != $value).
     * @return mixed
     */
    public static function isEqual($expected, $value, $format, $args = null, $_ = null) {
        if ($expected != $value) {
            self::fail($format, $args, $_);
        }
        return $value;
    }

    /**
     * Fails with the given message if $value equal: ($expected != $value).
     * @return mixed
     */
    public static function isNotEqual($expected, $value, $format, $args = null, $_ = null) {
        if ($expected == $value) {
            self::fail($format, $args, $_);
        }
        return $value;
    }

    /**
     * Fails with the given message if $value <= $expected.
     * @return mixed
     */
    public static function isGreaterThan($expected, $value, $format, $args = null, $_ = null) {
        if ($expected >= $value) {
            self::fail($format, $args, $_);
        }
        return $value;
    }

    /**
     * Fails with the given message if $value < $expected.
     * @return mixed
     */
    public static function isGreaterThanOrEqual($expected, $value, $format, $args = null, $_ = null) {
        if ($expected > $value) {
            self::fail($format, $args, $_);
        }
        return $value;
    }

    /**
     * Fails with the given message if $value >= $expected.
     * @return mixed
     */
    public static function isLessThan($expected, $value, $format, $args = null, $_ = null) {
        if ($expected <= $value) {
            self::fail($format, $args, $_);
        }
        return $value;
    }

    /**
     * Fails with the given message if $value > $expected.
     * @return mixed
     */
    public static function isLessThanOrEqual($expected, $value, $format, $args = null, $_ = null) {
        if ($expected < $value) {
            self::fail($format, $args, $_);
        }
        return $value;
    }

    /**
     * Fails with the given message if $value is not instanceof $cl: !($value instanceof $cl).
     * @return mixed
     */
    public static function isInstanceOf($cl, $value, $format, $args = null, $_ = null) {
        if (!($value instanceof $cl)) {
            self::fail($format, $args, $_);
        }
        return $value;
    }


    /**
     * Fails with the given message if $value is instanceof $cl: ($value instanceof $cl).
     * @return mixed
     */
    public static function isNotInstanceOf($cl, $value, $format, $args = null, $_ = null) {
        if ($value instanceof $cl) {
            self::fail($format, $args, $_);
        }
        return $value;
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