# [SilverStripe Inheritage by SiteTree](https://github.com/FriendsOfSilverStripe/inheritage-by-sitetree)

[![Build Status](https://api.travis-ci.org/FriendsOfSilverStripe/inheritage-by-sitetree.svg?branch=master)](https://travis-ci.org/FriendsOfSilverStripe/inheritage-by-sitetree)
[![Latest Stable Version](https://poser.pugx.org/FriendsOfSilverStripe/inheritage-by-sitetree/version.svg)](https://github.com/FriendsOfSilverStripe/inheritage-by-sitetree/releases)
[![Latest Unstable Version](https://poser.pugx.org/FriendsOfSilverStripe/inheritage-by-sitetree/v/unstable.svg)](https://packagist.org/packages/FriendsOfSilverStripe/inheritage-by-sitetree)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/FriendsOfSilverStripe/inheritage-by-sitetree.svg)](https://scrutinizer-ci.com/g/FriendsOfSilverStripe/inheritage-by-sitetree?branch=master)
[![Total Downloads](https://poser.pugx.org/FriendsOfSilverStripe/inheritage-by-sitetree/downloads.svg)](https://packagist.org/packages/FriendsOfSilverStripe/inheritage-by-sitetree)
[![License](https://poser.pugx.org/FriendsOfSilverStripe/inheritage-by-sitetree/license.svg)](https://github.com/FriendsOfSilverStripe/inheritage-by-sitetree/blob/master/license.md)

Allows you to inheritage any property from parent pages (any level).

## Features

* Loading information from direct or indirect parent page.

*This is only tested for db-fields. Has_one or has_many hasn't be confirmed.*

## Requirements and installation

### Requirements

* SilverStripe Framework and CMS ^3.0

### Installation

Run the following commands to install the package:

```
# install the package
composer require FriendsOfSilverStripe/inheritage-by-sitetree dev-master

# run dev/build to load extension
php ./framework/cli-script.php dev/build
```

## Usage

```yaml
Page:
  extensions:
    InheritageBySiteTreeExtension
```


The following example shows a possible use case:

```php
<?php
/**
 * In the SiteTree this page will be directly under the homepage.
 */
class LandingPage extends Page
{
    $db = [
        'Color' => 'Varchar',
    ];

    /**
     * @todo add restrictions to the sitetree structure
     */
}
/* ... */
```

```php
<?php
/**
 * In the SiteTree this page will be directly under the landing page.
 */
class SubLandingPage extends Page
{
    /**
     * @todo add restrictions to the sitetree structure
     */
}
class SubLandingPage_Controller extends Page_Controller
{
}
```

in SubLandingPage.ss you can do this now:

```
    <div>
    $GetFromParentPage(Color)
    </div>
```

## License

This module was published under the BSD-3-Clause license.
