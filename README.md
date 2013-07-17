# ZfrMailChimp, a MailChimp PHP Library

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

### How to use it ?

You will notice that the method names below does not always have a 1-to-1 mapping with the API names. What I wanted
to do is making the names as natural as possible (for instance, I added "get" in front of most methods). Moreover,
parameters for each method can be found be reading the ServiceDescription file. For instance, let's take the "Subscribe"
description:

```php
'Subscribe' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/subscribe.json',
            'summary'          => 'Subscribe the given email address to the list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/subscribe.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'id' => array(
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
                'email' => array(
                    'description' => 'The email to add',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ),
                'merge_vars' => array(
                    'description' => 'Optional merge variables to the email',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ),
                'email_type' => array(
                    'description' => 'Email type preference for the email',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => array('html', 'text')
                ),
                'double_optin' => array(
                    'description' => 'Flag to control whether to send an opt-in confirmation email - defaults to true',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ),
                'update_existing' => array(
                    'description' => 'Flag to control whether to update members that are already subscribed to the list or to return an error - defaults to false',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ),
                'replace_interests' => array(
                    'description' => 'Flag to determine whether we replace the interest groups with the updated groups provided, or we add the provided groups to the member\'s interest groups - defaults to true',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ),
                'send_welcome'    => array(
                    'description' => 'Decide wether to send a send welcome email',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                )
            )
        ),
```

If you have a look at the [official documentation](http://apidocs.mailchimp.com/api/2.0/lists/subscribe.php) for this method, you can see from both the descriptor and the doc that "email" is in fact an array, and that it accepts "email", "euid" and
"leid" parameters. You can therefore call this method like that:

```php
$client->subscribe(array(
	'id'    => 'my-list-id',
	'email' => array('email' => 'my-address@foo.com')
));
```

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
* array subscribe(array $args = array()) {@command MailChimp Subscribe}
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
