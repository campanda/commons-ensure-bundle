<?php

/**
 * EnsureBundle
 * Copyright (c) 2018, Campanda GmbH, All rights reserved.
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

namespace campanda\Commons\EnsureBundle;

/**
 * Exception thrown if an Ensure check has failed. See the exception message for details about the reason.
 */
class EnsureException extends \Exception {

    public function __construct($message) {
        parent::__construct($message);
    }
}