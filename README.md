# ZfrMailChimp, a MailChimp PHP Library

## Introduction

This is an unofficial MailChimp PHP client for interacting with the v2 REST MailChimp API. If you are looking
for a wrapper around previous MailChimp API versions (like 1.3), please refer to something else.

## Dependencies

* [Guzzle library](http://guzzlephp.org): >= 3.4

## Integration with frameworks

To make this library even more easier to use, here are various libraries:

* [ZfrMailChimpModule](https://github.com/zf-fr/zfr-mailchimp-module): this is a Zend Framework 2 module

Want to do an integration for another framework? Open an issue, and I'll open a repository for you!

## Installation

We recommend you to use Composer to install ZfrMailChimp. Just add the following line into your `composer.json` file:

```json
{
    require: {
        "zfr/zfr-mailchimp": "1.*"
    }
}
```

Then, update your dependencies by typing: `php composer.phar update`.

## Tutorial

Instantiate the Guzzle client:

```php
$client = new MailChimpClient('my-api-key');
```

The correct endpoint will be selected based on your API key.

You can then have access to all the methods:

```php
$activity = $client->getActivity(array(
    'id' => 'list-id'
));
```
