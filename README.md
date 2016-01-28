yii2-last-page
===================

LastPage lets you get last url.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either add

```
"require": {
    "keygenqt/yii2-last-page": "*"
},
"repositories":[
    {
        "type": "git",
        "url": "https://github.com/keygenqt/yii2-last-page.git"
    }
]
```

of your `composer.json` file.

## Latest Release

The latest version of the module is v0.5.0 `BETA`.

## Usage

All controllers or base controller:

```php
use \keygenqt\lastPage\LastPage;

class BaseController extends LastPage
{
	...
```

Get url:

```php
Yii::$app->user->getReturnUrl()
```

## License

**yii2-last-page** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.


