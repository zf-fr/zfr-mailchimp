# ZfrMailChimp, a MailChimp PHP Library

> This library is a work-in-progress, not complete yet

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

## To do

* Add all missing methods for other components
* Provide models like Folder, Campaign...
* Provide Guzzle iterators for simpler traversal
* Add service layer on top on Guzzle client for easier usage
* Add tests

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
        "zfr/zfr-mailchimp": "dev-master"
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

You can then have access to all the methods available to date:

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

### Services

Interacting with the client is a bit lower-level and involves manually creating the request array. ZfrMailChimp
therefore provide higher level classes for each part of MailChimp API. As of today, only folders related methods
are supported.

You just need to instantiate the service:

```php
$client = new MailChimpClient('my-api-key');
$service = new FolderService($client);

$folderId = $service->addFolder('my-folder', FolderType::CAMPAIGN);
$service->removeFolder($folderId, FolderType::CAMPAIGN);
```

The library provides basic validation for most methods. For instance, in the "addFolder" method, if you provide
a type different than "campaign", "autoresponder" or "template", a `Guzzle\Service\Exception\ValidationException`
will be thrown.

### Complete reference

Here are the supported methods today (you can see that the name sometimes does not match the exact API URL, this
is to make the library more convenient to use in this context):

CAMPAIGN RELATED METHODS:

* array createCampaign(array $args = array()) {@command MailChimp CreateCampaign}
* array deleteCampaign(array $args = array()) {@command MailChimp DeleteCampaign}
* array getCampaignContent(array $args = array()) {@command MailChimp GetCampaignContent}
* array getCampaigns(array $args = array()) {@command MailChimp GetCampaigns}
* array getTemplateContent(array $args = array()) {@command MailChimp GetTemplateContent}
* array pauseCampaign(array $args = array()) {@command MailChimp PauseCampaign}
* array replicateCampaign(array $args = array()) {@command MailChimp ReplicateCampaign}
* array resumeCampaign(array $args = array()) {@command MailChimp ResumeCampaign}
* array scheduleCampaign(array $args = array()) {@command MailChimp ScheduleCampaign}
* array scheduleBatchCampaign(array $args = array()) {@command MailChimp ScheduleBatchCampaign}
* array sendCampaign(array $args = array()) {@command MailChimp SendCampaign}
* array sendTestCampaign(array $args = array()) {@command MailChimp SendTestCampaign}
* array testSegmentation(array $args = array()) {@command MailChimp TestSegmentation}
* array unscheduleCampaign(array $args = array()) {@command MailChimp UnscheduleCampaign}
* array updateCampaign(array $args = array()) {@command MailChimp UpdateCampaign}

LIST RELATED METHODS:

* array addInterestGroup(array $args = array()) {@command MailChimp AddInterestGroup}
* array addInterestGrouping(array $args = array()) {@command MailChimp AddInterestGrouping}
* array addListMergeVar(array $args = array()) {@command MailChimp AddListMergeVar}
* array batchSubscribe(array $args = array()) {@command MailChimp BatchSubscribe}
* array batchUnsubscribe(array $args = array()) {@command MailChimp BatchUnsubscribe}
* array deleteInterestGroup(array $args = array()) {@command MailChimp DeleteInterestGroup}
* array deleteInterestGrouping(array $args = array()) {@command MailChimp DeleteInterestGrouping}
* array deleteListMergeVar(array $args = array()) {@command MailChimp DeleteListMergeVar}
* array getAbuseReports(array $args = array()) {@command MailChimp GetAbuseReports}
* array getListActivity(array $args = array()) {@command MailChimp GetListActivity}
* array getListClients(array $args = array()) {@command MailChimp GetListClients}
* array getListGrowthHistory(array $args = array()) {@command MailChimp GetListGrowthHistory}
* array getInterestGroupings(array $args = array()) {@command MailChimp GetInterestGroupings}
* array getListMergeVars(array $args = array()) {@command MailChimp GetListMergeVars}
* array getLists(array $args = array()) {@command MailChimp GetLists}
* array getListLocations(array $args = array()) {@command MailChimp GetListLocations}
* array getListMembers(array $args = array()) {@command MailChimp GetListMembers}
* array getListMembersActivity(array $args = array()) {@command MailChimp GetListMembersActivity}
* array getListMembersInfo(array $args = array()) {@command MailChimp GetListMembersInfo}
* array resetListMergeVar(array $args = array()) {@command MailChimp ResetListMergeVar}
* array setListMergeVar(array $args = array()) {@command MailChimp SetListMergeVar}
* array unsubscribe(array $args = array()) {@command MailChimp Unsubscribe}
* array updateInterestGroup(array $args = array()) {@command MailChimp UpdateInterestGroup}
* array updateInterestGrouping(array $args = array()) {@command MailChimp UpdateInterestGrouping}

ECOMM RELATED METHODS:

* array addOrder(array $args = array()) {@command MailChimp AddOrder}
* array deleteOrder(array $args = array()) {@command MailChimp DeleteOrder}
* array getOrders(array $args = array()) {@command MailChimp GetOrders}

FOLDER RELATED METHODS:

* array addFolder(array $args = array()) {@command MailChimp AddFolder}
* array deleteFolder(array $args = array()) {@command MailChimp DeleteFolder}
* array getFolders(array $args = array()) {@command MailChimp GetFolders}
* array updateFolders(array $args = array()) {@command MailChimp UpdateFolders}

TEMPLATE RELATED METHODS:

* array addTemplate(array $args = array()) {@command MailChimp AddTemplate}
* array deleteTemplate(array $args = array()) {@command MailChimp DeleteTemplate}
* array getTemplateInfo(array $args = array()) {@command MailChimp GetTemplateInfo}
* array getTemplates(array $args = array()) {@command MailChimp GetTemplates}
* array undeleteTemplate(array $args = array()) {@command MailChimp UndeleteTemplate}
* array updateTemplate(array $args = array()) {@command MailChimp UpdateTemplate}

USERS RELATED METHODS:

* array inviteUser(array $args = array()) {@command MailChimp InviteUser}
* array getInvitations(array $args = array()) {@command MailChimp GetInvitations}
* array getLogins(array $args = array()) {@command MailChimp GetLogins}
* array reinviteUser(array $args = array()) {@command MailChimp ReinviteUser}
* array revokeLogin(array $args = array()) {@command MailChimp RevokeLogin}
* array revokeUserInvitation(array $args = array()) {@command MailChimp RevokeUserInvitation}

VIP RELATED METHODS:

* array addVipMembers(array $args = array()) {@command MailChimp AddVipMembers}
* array deleteVipMembers(array $args = array()) {@command MailChimp DeleteVipMembers}
* array getVipMembers(array $args = array()) {@command MailChimp GetVipMembers}
* array getVipActivity(array $args = array()) {@command MailChimp GetVipActivity}

HELPER RELATED METHODS:

* array getAccountDetails(array $args = array()) {@command MailChimp GetAccountDetails}
* array ping(array $args = array()) {@command MailChimp Ping}
