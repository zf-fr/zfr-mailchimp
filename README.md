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
* Report related methods (only main methods)
* Templates related methods (complete)
* List related methods (nearly complete)
* Gallery related methods (complete)
* Helper related methods (partially complete)

## Dependencies

* [Guzzle library](http://guzzlephp.org): >= 3.5

## Integration with frameworks

To make this library even more easier to use, here are various frameworks integrations:

* [ZfrMailChimpModule](https://github.com/zf-fr/zfr-mailchimp-module): a Zend Framework 2 module
* [ZfrMailChimpBundle](https://github.com/zf-fr/zfr-mailchimp-bundle): a Symfony 2 bundle

Want to do an integration for another framework? Open an issue, and I'll open a repository for you!

## Installation

We recommend you to use Composer to install ZfrMailChimp:

```sh
php composer.phar require zfr/zfr-mailchimp:2.*
```

## Tutorial

Firstly, you need to instantiate the MailChimp client:

```php
$client = new MailChimpClient('my-api-key');
```

The correct endpoint will be automatically chosen based on your API key.

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
most method that imply retrieving something are prefixed by "get".

However, there is an exact mapping for parameters. Therefore, you just need to refer to the official documentation
for a given method (links are given below). Here is an example with the [subscribe](http://apidocs.mailchimp.com/api/2.0/lists/subscribe.php) method:

```php
$client->subscribe(array(
    'id' => 'list-id',
    'email' => array(
        'email' => 'example@foo.com',
        'euid'  => '1545d'
    )
));
```

### Exceptions handling

ZfrMailChimp tries its best to extract meaningful exceptions from MailChimp errors. All exceptions implement the
`ZfrMailChimp\Exception\ExceptionInterface` interface, so you can use this to do a catch all block. You can find an
exhaustive list of all exceptions in the `ZfrMailChimp\Exception` folder.

> List exceptions are under the Ls namespace, because list is a reserved keyword in PHP.

Usage example:

```php
try {
    $client->subscribe(array(
        'id' => 'list-id',
        'email' => array(
            'email' => 'example@foo.com',
            'euid'  => '1545d'
        )
    ));
} catch (\ZfrMailChimp\Exception\Ls\AlreadySubscribedException $e) {
    $message = $e->getMessage();

    // You can do something interesting here!
} catch(\ZfrMailChimp\Exception\Ls\DoesNotExistException $e) {
    // Do something else useful!
}
catch (\ZfrMailChimp\Exception\ExceptionInterface $e) {
    // Any other exception that may occur
}
```

### Complete reference

Here are the supported methods today:

CAMPAIGN RELATED METHODS:

* array createCampaign(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/campaigns/create.php)
* array deleteCampaign(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/campaigns/delete.php)
* array getCampaignContent(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/campaigns/content.php)
* array getCampaigns(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/campaigns/list.php)
* array getTemplateContent(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/campaigns/template-content.php)
* array pauseCampaign(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/campaigns/pause.php)
* array replicateCampaign(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/campaigns/replicate.php)
* array resumeCampaign(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/campaigns/resume.php)
* array scheduleCampaign(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/campaigns/schedule.php)
* array scheduleBatchCampaign(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/campaigns/schedule-batch.php)
* array sendCampaign(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/campaigns/send.php)
* array sendTestCampaign(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/campaigns/send-test.php)
* array testSegmentation(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/campaigns/segment-test.php)
* array unscheduleCampaign(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/campaigns/unschedule.php)
* array updateCampaign(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/campaigns/update.php)

LIST RELATED METHODS:

* array addInterestGroup(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/interest-group-add.php)
* array addInterestGrouping(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/interest-grouping-add.php)
* array addListMergeVar(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/merge-var-add.php)
* array addListSegment(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/segment-add.php)
* array addListWebhook(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/webhook-add.php)
* array addStaticListSegment(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/static-segment-add.php)
* array addStaticSegmentMembers(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/static-segment-members-add.php)
* array batchSubscribe(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/batch-subscribe.php)
* array batchUnsubscribe(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/batch-unsubscribe.php)
* array deleteInterestGroup(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/interest-group-del.php)
* array deleteInterestGrouping(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/interest-grouping-del.php)
* array deleteListMergeVar(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/merge-var-del.php)
* array deleteListSegment(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/segment-del.php)
* array deleteListWebhook(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/webhook-del.php)
* array deleteStaticSegmentMembers(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/static-segment-members-del.php)
* array getAbuseReports(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/abuse-reports.php)
* array getInterestGroupings(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/interest-groupings.php)
* array getListActivity(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/activity.php)
* array getListClients(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/clients.php)
* array getListGrowthHistory(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/growth-history.php)
* array getListMergeVars(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/merge-vars.php)
* array getLists(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/list.php)
* array getListLocations(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/locations.php)
* array getListMembers(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/members.php)
* array getListMembersActivity(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/member-activity.php)
* array getListMembersInfo(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/member-info.php)
* array getListSegments(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/segments.php)
* array getListStaticSegments(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/static-segments.php)
* array getListWebhooks(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/webhooks.php)
* array resetListMergeVar(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/merge-var-reset.php)
* array resetStaticSegment(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/static-segment-reset.php)
* array setListMergeVar(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/merge-var-set.php)
* array subscribe(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/subscribe.php)
* array testListSegment(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/segment-test.php)
* array unsubscribe(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/unsubscribe.php)
* array updateInterestGroup(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/interest-group-update.php)
* array updateInterestGrouping(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/interest-grouping-update.php)
* array updateListMember(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/update-member.php)
* array updateListSegment(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/lists/segment-update.php)

ECOMM RELATED METHODS:

* array addOrder(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/ecomm/order-add.php)
* array deleteOrder(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/ecomm/order-del.php)
* array getOrders(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/ecomm/orders.php)

FOLDER RELATED METHODS:

* array addFolder(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/folders/add.php)
* array deleteFolder(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/folders/del.php)
* array getFolders(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/folders/list.php)
* array updateFolders(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/folders/update.php)

TEMPLATE RELATED METHODS:

* array addTemplate(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/templates/add.php)
* array deleteTemplate(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/templates/del.php)
* array getTemplateInfo(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/templates/info.php)
* array getTemplates(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/templates/list.php)
* array undeleteTemplate(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/templates/undel.php)
* array updateTemplate(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/templates/update.php)

REPORT RELATED METHODS:

* array getCampaignAbuseReport(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/reports/abuse.php)
* array getCampaignAdviceReport(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/reports/advice.php)
* array getCampaignBounceMessage(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/reports/bounce-message.php)
* array getCampaignBounceMessages(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/reports/bounce-messages.php)
* array getCampaignSummaryReport(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/reports/summary.php)
* array getCampaignGoogleAnalyticsReport(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/reports/google-analytics.php)

USERS RELATED METHODS:

* array inviteUser(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/users/invite.php)
* array getInvitations(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/users/invites.php)
* array getLogins(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/users/logins.php)
* array getProfile(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/users/profile.php)
* array reinviteUser(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/users/invite-resend.php)
* array revokeLogin(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/users/login-revoke.php)
* array revokeUserInvitation(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/users/invite-revoke.php)

VIP RELATED METHODS:

* array addVipMembers(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/vip/add.php)
* array deleteVipMembers(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/vip/del.php)
* array getVipMembers(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/vip/members.php)
* array getVipActivity(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/vip/activity.php)

GALLERY RELATED METHODS:

* array getGalleryImages(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/gallery/list.php)

HELPER RELATED METHODS:

* array getAccountDetails(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/helper/account-details.php)
* array ping(array $args = array()) [doc](http://apidocs.mailchimp.com/api/2.0/helper/ping.php)

## Advanced usage

### Attaching Guzzle plugins

Because ZfrMailChimp is built on top of Guzzle, you can take advantage of all the nice features of it. For instance,
let's say you want to send requests asynchronously, you can simply attach the built-in Async plugin:

```php
use ZfrMailChimp\Client\MailChimpClient;
use Guzzle\Plugin\Async\AsyncPlugin;

$client = new MailChimpClient('my-secret-key');
$client->addSubscriber(new AsyncPlugin());
$response = $client->get()->send();
```
