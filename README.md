# 20steps/commons-ensure-bundle (twentystepsCommonsEnsureBundle)

[![Build Status](https://travis-ci.org/20steps/commons-ensure-bundle.svg?branch=master)](https://travis-ci.org/20steps/commons-ensure-bundle)
[![Dependency Status](https://www.versioneye.com/user/projects/58542cc4ad9aa20040cc37f3/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/58542cc4ad9aa20040cc37f3)
[![Packagist version](https://img.shields.io/packagist/v/20steps/commons-ensure-bundle.svg)](https://packagist.org/packages/20steps/commons-ensure-bundle)


About
-----

The 20steps Commons Ensure Bundle contains static helper functions for checking coding pre-/post-conditions. The check
helps to fail early with a EnsureException in the case of missmatched assertions with a meaningful sprintf format
message. In comparison to PHP's assert() command, the ensure checks are always enabled.

The 20steps Commons Ensure Bundle is licensed under the LGPL license version 3.0 (http://www.gnu.org/licenses/lgpl-3.0.html).

Installation
------------

1. Add the bundle to your composer.json and download a matching version by calling

```bash
composer require 20steps/common-ensure-bundle
```

Prerequisite: Install [**Composer**][1], the dependency manager used by modern PHP applications.

Usage
-----

The following code shows some simple method call using the Ensure Bundle.

```
<?php

use twentysteps\Commons\EnsureBundle\Ensure;

class Foo {

    private $name;

    public function bar($entityName, $num) {
        $this->name = Ensure::isNotEmpty($entityName, 'entityName must not be empty');
        Ensure::isGreaterThan(0, $num, 'num must be positive for entityName [%s]', $entityName);
        // do some stuff...
    }
}
```

Authors
-------

* Marc Ewert <marc.ewert@20steps.de>
* Helmut Hoffer von Ankershoffen <hhva@20steps.de>

Sponsored by
------------

[**20steps - Digital Full Service Boutique**][2]

[1]:  https://getcomposer.org/
[2]:  https://20steps.de