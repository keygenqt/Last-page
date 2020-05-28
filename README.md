Last Page
===================

![GitHub](https://img.shields.io/github/license/keygenqt/yii2-last-page)
![Packagist Downloads](https://img.shields.io/packagist/dt/keygenqt/yii2-last-page)

LastPage lets you get last url.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either add

```
"require": {
    "keygenqt/yii2-last-page": "*"
}
```

of your `composer.json` file.

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