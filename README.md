# 20steps/commons-ensure-bundle (twentystepsCommonsEnsureBundle)

## About

The 20steps Commons Ensure Bundle contains static helper functions for checking coding pre-/post-conditions. The check
helps to fail early with a EnsureException in the case of missmatched assertions with a meaningful sprintf format
message. In comparison to PHP's assert() command, the ensure checks are always enabled.

The 20steps Commons Ensure Bundle is licensed under the LGPL license version 3.0 (http://www.gnu.org/licenses/lgpl-3.0.html).

## Installation

Require the bundle by adding the following entry to the respective section of your composer.json:

```
"20steps/commons-ensure-bundle": "dev-master"
```

Get the bundle via packagist from GitHub by calling:

```
php composer.phar update 20steps/commons-ensure-bundle
```

## Usage

The following code shows some simple method calls using the Ensure Bundle.

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

## Author

Marc Ewert (marc.ewert@20steps.de)

sponsored by: <a href="http://20steps.de">20steps - Digital Full Service Boutique</a>