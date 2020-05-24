# Yii 2 HTTP client

This extension extends the [yii2-httpclient](https://github.com/yiisoft/yii2-httpclient)
extension to add some basic functionality.

[![Packagist Version](https://img.shields.io/packagist/v/thoulah/yii2-httpclient.svg)](https://packagist.org/packages/thoulah/yii2-httpclient)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/thoulah/yii2-httpclient.svg)](https://php.net/)
[![Packagist](https://img.shields.io/packagist/dt/thoulah/yii2-httpclient.svg)](https://packagist.org/packages/thoulah/yii2-httpclient)
[![GitHub](https://img.shields.io/github/license/Thoulah/yii2-httpclient.svg)](https://github.com/Thoulah/yii2-httpclient/blob/master/LICENSE)

## Installation

The preferred way to install this extension is through [composer](https://getcomposer.org/).

Either run

```bash
composer require thoulah/yii2-httpclient
```

or add

```json
"thoulah/yii2-httpclient": "^1.0"
```

to the `require` section of your `composer.json` file.

## Usage

```php
$client = new \thoulah\httpclient\Client('https://www.google.com/');
$response = $client->getUrl('');
$site = $response->content;
```

```php
$client = new \thoulah\httpclient\Client('https://www.google.com/');
$response = $client->getFile('robots.txt');
$file = $response->data;
```

```php
$client = new \thoulah\httpclient\Client('https://www.google.com/');
$response = $client->saveFile('robots.txt', /tmp/googleRobots.txt);
```

[![Code Climate maintainability](https://img.shields.io/codeclimate/maintainability/Thoulah/yii2-httpclient.svg)](https://codeclimate.com/github/Thoulah/yii2-httpclient/maintainability)
[![Codacy branch grade](https://img.shields.io/codacy/grade/ec9740b1cfab45808c12e16bb43ca4fb/master.svg)](https://www.codacy.com/app/Thoulah/yii2-httpclient)
[![Scrutinizer code quality (GitHub/Bitbucket)](https://img.shields.io/scrutinizer/quality/g/Thoulah/yii2-httpclient/master.svg)](https://scrutinizer-ci.com/g/Thoulah/yii2-httpclient/?branch=master)
[![Travis (.com) branch](https://img.shields.io/travis/com/Thoulah/yii2-httpclient/master.svg)](https://travis-ci.com/Thoulah/yii2-httpclient)
