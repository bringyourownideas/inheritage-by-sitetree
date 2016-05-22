# SilverStripe Inheritage by SiteTree

Allows you to [inherits any property from parent pages](https://github.com/FriendsOfSilverStripe/inheritage-by-sitetree) (any level). Check out the [usage example](https://github.com/FriendsOfSilverStripe/inheritage-by-sitetree#usage) to see how it works.

[![Build Status](https://api.travis-ci.org/FriendsOfSilverStripe/inheritage-by-sitetree.svg?branch=master)](https://travis-ci.org/FriendsOfSilverStripe/inheritage-by-sitetree)
[![Latest Stable Version](https://poser.pugx.org/FriendsOfSilverStripe/inheritage-by-sitetree/version.svg)](https://github.com/FriendsOfSilverStripe/inheritage-by-sitetree/releases)
[![Latest Unstable Version](https://poser.pugx.org/FriendsOfSilverStripe/inheritage-by-sitetree/v/unstable.svg)](https://packagist.org/packages/FriendsOfSilverStripe/inheritage-by-sitetree)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/FriendsOfSilverStripe/inheritage-by-sitetree.svg)](https://scrutinizer-ci.com/g/FriendsOfSilverStripe/inheritage-by-sitetree?branch=master)
[![Total Downloads](https://poser.pugx.org/FriendsOfSilverStripe/inheritage-by-sitetree/downloads.svg)](https://packagist.org/packages/FriendsOfSilverStripe/inheritage-by-sitetree)
[![License](https://poser.pugx.org/FriendsOfSilverStripe/inheritage-by-sitetree/license.svg)](https://github.com/FriendsOfSilverStripe/inheritage-by-sitetree/blob/master/license.md)

## Features

* Loading information from direct or indirect parent page.

*This is only tested for db-fields. Has_one or has_many hasn't be confirmed.*


## Usage

The following example shows a possible use case of two page types which have a fixed position in the information architecture and using inheritage to get the "color" field to the sublanding page.

```php
<?php
/**
 * In the SiteTree this page will be directly under the homepage.
 *
 * URL structure /landing
 */
class LandingPage extends Page
{
    $db = [
        'Color' => 'Varchar',
    ];
}
class LandingPage_Controller extends Page_Controller
{
}
/* ... */
```

```php
<?php
/**
 * In the SiteTree this page will be directly under the landing page.
 *
 * URL structure /landing/sublanding
 */
class SubLandingPage extends Page
{
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

to retrieve the Color value set on the parent.

## Requirements and installation

### Requirements

* SilverStripe Framework and CMS ^3.0

### Installation

1. Run the following command to install the package:

    ```
    # install the package
    composer require FriendsOfSilverStripe/inheritage-by-sitetree dev-master;
    git add composer.json composer.lock;
    git commit -m 'MINOR: adding inheritage-by-sitetree';
    ```

2. Set up your Extension

    This can be done either via a yml configuration file (e.g. mysite/_config/config.yml):

    ```yaml
    Page:
      extensions:
        InheritageBySiteTreeExtension
    ```

    *or* by checking the [InheritageBySiteTreeExtension.php](https://github.com/FriendsOfSilverStripe/inheritage-by-sitetree/blob/master/code/extensions/InheritageBySiteTreeExtension.php) and adding the "non-extension" version of the module to your Page.php-file. The second option is more performant.

3. Run dev/build to load extension

    ```bash
    # run dev/build to load extension
    php ./framework/cli-script.php dev/build
    ```

## MISC: [Future ideas/development, issues](https://github.com/FriendsOfSilverStripe/inheritage-by-sitetree/issues), [License](https://github.com/FriendsOfSilverStripe/inheritage-by-sitetree/blob/master/license.md), [Contributing](https://github.com/FriendsOfSilverStripe/inheritage-by-sitetree/blob/master/CONTRIBUTING.md)
