# Campanda/commons-ensure-bundle (campandaCommonsEnsureBundle)

About
-----

The Campanda Commons Ensure Bundle contains static helper functions for checking coding pre-/post-conditions. The check
helps to fail early with a EnsureException in the case of missmatched assertions with a meaningful sprintf format
message. In comparison to PHP's assert() command, the ensure checks are always enabled.

The Campanda Commons Ensure Bundle is licensed under the LGPL license version 3.0 (http://www.gnu.org/licenses/lgpl-3.0.html).

Installation
------------

1. Add the bundle to your composer.json and download a matching version by calling

```bash
composer require campanda/common-ensure-bundle
```

Prerequisite: Install [**Composer**][1], the dependency manager used by modern PHP applications.

Usage
-----

The following code shows some simple method call using the Ensure Bundle.

```
<?php

use campanda\Commons\EnsureBundle\Ensure;

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
* Helmut Hoffer von Ankershoffen <hhva@campanda.com>

Sponsored by
------------

[**Campanda GmbHe**][2]

[1]:  https://getcomposer.org/
[2]:  https://campanda.com