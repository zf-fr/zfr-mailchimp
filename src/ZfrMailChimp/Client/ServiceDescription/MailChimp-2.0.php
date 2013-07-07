<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

return array(
    'name'        => 'MailChimp',
    'apiVersion'  => '2.0',
    'description' => 'MailChimp is a cloud provider that allows to send mail campaigns easily',
    'operations'  => array(
        /**
         * --------------------------------------------------------------------------------
         * LIST RELATED OPERATIONS
         * --------------------------------------------------------------------------------
         */
        'AddInterestGroup' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/interest-group-add.json',
            'summary'          => 'Add a single Interest Group',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/interest-group-add.php',
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
                'group_name' => array(
                    'description' => 'The interest group to add - group names must be unique within a grouping',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
                'grouping_id' => array(
                    'description' => 'The grouping to add the new group to. If not supplied, the first grouping on the list is used.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                )
            )
        ),

        'AddInterestGrouping' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/interest-grouping-add.json',
            'summary'          => 'Add a new Interest Grouping',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/interest-grouping-add.php',
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
                'name' => array(
                    'description' => 'The interest grouping to add - grouping names must be unique',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
                'type' => array(
                    'description' => 'The type of the grouping to add - one of "checkboxes", "hidden", "dropdown", "radio"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => array('checkboxes', 'hidden', 'dropdown', 'radio')
                ),
                'groups' => array(
                    'description' => 'The lists of initial group names to be added - at least 1 is required and the names must be unique within a grouping. If the number takes you over the 60 group limit, an error will be thrown.'
                )
            )
        ),

        'BatchSubscribe' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/batch-subscribe.json',
            'summary'          => 'Subscribe a batch of email addresses to a list at once',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/batch-subscribe.php',
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
                'batch' => array(
                    'description' => 'Array of structs for each address',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
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
                    'description' => 'flag to determine whether we replace the interest groups with the updated groups provided, or we add the provided groups to the member\'s interest groups - defaults to true',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                )
            )
        ),

        'BatchUnsubscribe' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/batch-unsubscribe.json',
            'summary'          => 'Unsubscribe a batch of email addresses to a list at once',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/batch-unsubscribe.php',
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
                'batch' => array(
                    'description' => 'Array of structs for each address',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ),
                'delete_member' => array(
                    'description' => 'Flag to completely delete the member from your list instead of just unsubscribing - default to false',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ),
                'send_goodbye' => array(
                    'description' => 'Flag to send the goodbye email to the email addresses - defaults to true',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ),
                'send_notify' => array(
                    'description' => 'Flag to send the unsubscribe notification email to the address defined in the list email notification settings - defaults to false',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                )
            )
        ),

        'DeleteInterestGroup' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/interest-group-del.json',
            'summary'          => 'Delete a single Interest Group',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/interest-group-del.php',
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
                'group_name' => array(
                    'description' => 'The interest group to delete - group names must be unique within a grouping',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
                'grouping_id' => array(
                    'description' => 'The grouping to delete the group from. If not supplied, the first grouping on the list is used.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                )
            )
        ),

        'DeleteInterestGrouping' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/interest-grouping-del.json',
            'summary'          => 'Delete a single Interest Grouping',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/interest-grouping-del.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'grouping_id' => array(
                    'description' => 'The interest grouping id to delete',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                )
            )
        ),

        'GetAbuseReports' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/abuse-reports.json',
            'summary'          => 'Get all email addresses that complained about a campaign sent to a list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/abuse-reports.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'id' => array(
                    'description' => 'The list id to pull abuse reports for',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
                'start' => array(
                    'description' => 'Optional for large data sets, the page number to start at - defaults to 1st page of data (page 0)',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'minimum'     => 0
                ),
                'limit' => array(
                    'description' => 'Optional for large data sets, the number of results to return - defaults to 500, upper limit set at 1000',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'minimum'     => 0,
                    'maximum'     => 1000
                ),
            )
        ),

        'GetActivity' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/activity.json',
            'summary'          => 'Access up to the previous 180 days of daily detailed aggregated activity stats for a given list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/activity.php',
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
                )
            )
        ),

        'GetClients' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/clients.json',
            'summary'          => 'Retrieve the clients that the list\'s subscribers have been tagged as being used based on user agents seen',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/clients.php',
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
                )
            )
        ),

        'GetGrowthHistory' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/growth-history.json',
            'summary'          => 'Access the growth history by month for a given list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/growth-history.php',
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
                )
            )
        ),

        'GetInterestGroupings' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/interest-groupings.json',
            'summary'          => 'Get the interest groupings',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/interest-groupings.php',
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
                'counts' => array(
                    'description' => 'Whether or not to return subscriber counts for each group. Defaults to false since that slows this call down a ton for large lists.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                )
            )
        ),

        'GetLists' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/list.json',
            'summary'          => 'Retrieve all of the lists defined for your user account',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/list.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'filters' => array(
                    'description' => 'Filters to apply for this query',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ),
                'start' => array(
                    'description' => 'Control paging of lists, start results at this list #, defaults to 1st page of data (page 0)',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'minimum'     => 0
                ),
                'limit' => array(
                    'description' => 'Control paging of lists, number of lists to return with each call, defaults to 25 (max=100)',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'minimum'     => 0,
                    'maximum'     => 100
                ),
                'sort_field' => array(
                    'description' => '"Created" (the created date, default) or "web" (the display order in the web app)',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => array('created', 'web')
                ),
                'sort_dir' => array(
                    'description' => '"desc" for descending (default), "asc" for Ascending',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => array('desc', 'asc')
                )
            )
        ),

        'GetLocations' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/locations.json',
            'summary'          => 'Retrieve the locations (countries) that the list\'s subscribers have been tagged to based on geocoding their IP address',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/locations.php',
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
            )
        ),

        'GetMembers' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/members.json',
            'summary'          => 'Get all of the list members for a list that are of a particular status and potentially matching a segment. This will cause locking, so don\'t run multiples at once.',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/members.php',
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
                'status' => array(
                    'description' => 'The status to get members of (can be "subscribed", "unsubscribed" or "cleaned")',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => array('subscribed', 'unsubscribed', 'cleaned')
                ),
                'opts' => array(
                    'description' => 'Various options for controlling returned data',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                )
            )
        ),

        'GetMembersActivity' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/member-activity.json',
            'summary'          => 'Get the most recent 100 activities for particular list members (open, click, bounce, unsub, abuse, sent to, etc.)',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/member-activity.php',
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
                'emails' => array(
                    'description' => 'An array of up to 50 email address struct to retrieve activity information for',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true,
                    'maxItems'    => 50
                )
            )
        ),

        'GetMembersInfo' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/member-info.json',
            'summary'          => 'Get all the information for particular members of a list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/member-info.php',
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
                'emails' => array(
                    'description' => 'An array of up to 50 email address struct to retrieve member information for',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true,
                    'maxItems'    => 50
                )
            )
        ),

        'UpdateInterestGroup' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/interest-group-update.json',
            'summary'          => 'Update a single Interest Group',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/interest-group-update.php',
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
                'old_name' => array(
                    'description' => 'The interest group name to be changed',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
                'new_name' => array(
                    'description' => 'The interest group name to be set',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
                'grouping_id' => array(
                    'description' => 'The grouping to update the group from. If not supplied, the first grouping on the list is used.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                )
            )
        ),

        'UpdateInterestGrouping' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/interest-grouping-update.json',
            'summary'          => 'Update a single Interest Grouping',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/interest-grouping-update.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'grouping_id' => array(
                    'description' => 'The grouping id to update',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ),
                'name' => array(
                    'description' => 'The name of the field to update - either "name" or "type"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => array('name', 'type')
                ),
                'value' => array(
                    'description' => 'The new value of the field',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                )
            )
        ),
    ),
);
