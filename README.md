# ZfrMailChimp, a MailChimp PHP Library

[![Latest Stable Version](https://poser.pugx.org/zfr/zfr-mailchimp/v/stable.png)](https://packagist.org/packages/zfr/zfr-mailchimp)

> Note : this library does not contain tests, mainly because I'm not sure about how to write tests for an API
wrapper. Don't hesitate to help on this ;-).

## Introduction

This is an unofficial MailChimp PHP client for interacting with the v2 REST MailChimp API. If you are looking
for a wrapper around previous MailChimp API versions (like 1.3), please refer to something else.

## What is done

The following methods are supported by the client (not everything has been carefully tested though):

* Campaign related methods (complete)
* Ecomm related methods (complete)
* Vip related methods (complete)
* Folder related methods (complete)
* Users related methods (complete)
* Templates related methods (complete)
* List related methods (nearly complete)
* Helper related methods (partially complete)

## Dependencies

* [Guzzle library](http://guzzlephp.org): >= 3.4

## Integration with frameworks

To make this library even more easier to use, here are various libraries:

* [ZfrMailChimpModule](https://github.com/zf-fr/zfr-mailchimp-module): this is a Zend Framework 2 module

Want to do an integration for another framework? Open an issue, and I'll open a repository for you!

## Installation

We recommend you to use Composer to install ZfrMailChimp:

```sh
php composer.phar require zfr/zfr-mailchimp:dev-master
```

Then, update your dependencies by typing: `php composer.phar update`.

## Tutorial

Instantiate the MailChimp client:

```php
$client = new MailChimpClient('my-api-key');
```

The correct endpoint will be selected based on your API key.

You can then have access to all the methods available (see the list below):

```php
// Get activity about a list
$activity = $client->getListActivity(array(
    'id' => 'list-id'
));

// Add a new folder
$client->addFolder(array(
    'name' => 'my-folder-name',
    'type' => 'template'
));
```

### How to use it ?

You will notice that the method names below does not always have a 1-to-1 mapping with the API names. For instance,
most method that imply retrieving are prefixed by "get".

However, there is an exact mapping for parameters. For instance, let's take the subscribe method. The [documentation](http://apidocs.mailchimp.com/api/2.0/lists/subscribe.php)
describes the list of parameters:

```php
$client->subscribe(array(
    'id' => 'list-id',
    'email' => array(
        'email' => 'example@foo.com',
        'euid'  => '1545d'
    )
));
```

### Complete reference

Here are the supported methods today:

CAMPAIGN RELATED METHODS:

* array createCampaign(array $args = array())
* array deleteCampaign(array $args = array())
* array getCampaignContent(array $args = array())
* array getCampaigns(array $args = array())
* array getTemplateContent(array $args = array())
* array pauseCampaign(array $args = array())
* array replicateCampaign(array $args = array())
* array resumeCampaign(array $args = array())
* array scheduleCampaign(array $args = array())
* array scheduleBatchCampaign(array $args = array())
* array sendCampaign(array $args = array())
* array sendTestCampaign(array $args = array())
* array testSegmentation(array $args = array())
* array unscheduleCampaign(array $args = array())
* array updateCampaign(array $args = array())

LIST RELATED METHODS:

* array addInterestGroup(array $args = array())
* array addInterestGrouping(array $args = array())
* array addListMergeVar(array $args = array())
* array addListWebhook(array $args = array())
* array batchSubscribe(array $args = array())
* array batchUnsubscribe(array $args = array())
* array deleteInterestGroup(array $args = array())
* array deleteInterestGrouping(array $args = array())
* array deleteListWebhook(array $args = array())
* array deleteListMergeVar(array $args = array())
* array getAbuseReports(array $args = array())
* array getInterestGroupings(array $args = array())
* array getListActivity(array $args = array())
* array getListClients(array $args = array())
* array getListGrowthHistory(array $args = array())
* array getListMergeVars(array $args = array())
* array getListStaticSegments(array $args = array())
* array getLists(array $args = array())
* array getListLocations(array $args = array())
* array getListMembers(array $args = array())
* array getListMembersActivity(array $args = array())
* array getListMembersInfo(array $args = array())
* array getListWebhooks(array $args = array())
* array resetListMergeVar(array $args = array())
* array setListMergeVar(array $args = array())
* array subscribe(array $args = array())
* array unsubscribe(array $args = array())
* array updateInterestGroup(array $args = array())
* array updateInterestGrouping(array $args = array())
* array updateListMember(array $args = array())

ECOMM RELATED METHODS:

* array addOrder(array $args = array())
* array deleteOrder(array $args = array())
* array getOrders(array $args = array())

FOLDER RELATED METHODS:

* array addFolder(array $args = array())
* array deleteFolder(array $args = array())
* array getFolders(array $args = array())
* array updateFolders(array $args = array())

TEMPLATE RELATED METHODS:

* array addTemplate(array $args = array())
* array deleteTemplate(array $args = array())
* array getTemplateInfo(array $args = array())
* array getTemplates(array $args = array())
* array undeleteTemplate(array $args = array())
* array updateTemplate(array $args = array())

USERS RELATED METHODS:

* array inviteUser(array $args = array())
* array getInvitations(array $args = array())
* array getLogins(array $args = array())
* array reinviteUser(array $args = array())
* array revokeLogin(array $args = array())
* array revokeUserInvitation(array $args = array())

VIP RELATED METHODS:

* array addVipMembers(array $args = array())
* array deleteVipMembers(array $args = array())
* array getVipMembers(array $args = array())
* array getVipActivity(array $args = array())

HELPER RELATED METHODS:

* array getAccountDetails(array $args = array())
* array ping(array $args = array())
