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
         * CAMPAIGN RELATED OPERATIONS
         * --------------------------------------------------------------------------------
         */

        'CreateCampaign' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/create.json',
            'summary'          => 'Create a new draft campaign to send',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/create.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'type' => array(
                    'description' => 'Campaign type to create, can be "regular", "plaintext", "absplit", "rss" or "auto"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => array('regular', 'plaintext', 'absplit', 'rss', 'auto')
                ),
                'options' => array(
                    'description' => 'Various options to control the call',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ),
                'content' => array(
                    'description' => 'Content for this campaign',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ),
                'segment_opts' => array(
                    'description' => 'Options for segmentation tests',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ),
                'type_opts' => array(
                    'description' => 'Type specific options',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                )
            )
        ),

        'DeleteCampaign' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/delete.json',
            'summary'          => 'Delete an existing campaign',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/delete.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'campaign_id' => array(
                    'description' => 'The campaign id to delete',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'cid',
                    'required'    => true
                )
            )
        ),

        'GetCampaignContent' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/content.json',
            'summary'          => 'Get the content (both html and text) for a campaign either as it would appear in the campaign archive or as the raw, original content',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/content.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'campaign_id' => array(
                    'description' => 'The campaign id to get content for',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'cid',
                    'required'    => true
                ),
                'options' => array(
                    'description' => 'Various options to control the call',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                )
            )
        ),

        'GetCampaigns' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/list.json',
            'summary'          => 'Get the list of campaigns and their details matching the specified filters',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/list.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'filters' => array(
                    'description' => 'An array of filters to apply to this query',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ),
                'options' => array(
                    'description' => 'Various options to control the call',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ),
                'start' => array(
                    'description' => 'Control paging of campaigns, start results at this campaign #, defaults to 1st page of data (page 0)',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'minimum'     => 0
                ),
                'limit' => array(
                    'description' => 'Control paging of campaigns, number of compaigns to return with each call, defaults to 25 (max=1000)',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'minimum'     => 0,
                    'maximum'     => 1000
                ),
                'sort_field' => array(
                    'description' => 'Can be "create_time", "send_time", "title" or "subject" (defaults to "create_time")',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => array('create_time', 'send_time', 'title', 'subject')
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

        'GetTemplateContent' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/template-content.json',
            'summary'          => 'Get the HTML template content sections for a campaign',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/template-content.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'campaign_id' => array(
                    'description' => 'The campaign id to get content for',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'cid',
                    'required'    => true
                ),
            )
        ),

        'PauseCampaign' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/pause.json',
            'summary'          => 'Pause an AutoResponder or RSS campaign from sending',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/pause.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'campaign_id' => array(
                    'description' => 'The campaign id to pause',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'cid',
                    'required'    => true
                ),
            )
        ),

        'ReplicateCampaign' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/replicate.json',
            'summary'          => 'Replicate a campaign',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/replicate.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'campaign_id' => array(
                    'description' => 'The campaign id to replicate',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'cid',
                    'required'    => true
                ),
            )
        ),

        'ResumeCampaign' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/resume.json',
            'summary'          => 'Resume sending an AutoResponder or RSS campaign',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/resume.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'campaign_id' => array(
                    'description' => 'The campaign id to replicate',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'cid',
                    'required'    => true
                ),
            )
        ),

        'ScheduleCampaign' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/schedule.json',
            'summary'          => 'Schedule a campaign to be sent in the future',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/schedule.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'campaign_id' => array(
                    'description' => 'The campaign id to schedule',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'cid',
                    'required'    => true
                ),
                'schedule_time' => array(
                    'description' => 'The time to schedule the campaign (in 24 hour GMT format). For A/B Split "schedule" campaigns, the time for Group A',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
                'schedule_time_b' => array(
                    'description' => 'The time to schedule the campaign (in 24 hour GMT format). For A/B Split "schedule" campaigns, the time for Group B',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                )
            )
        ),

        'ScheduleBatchCampaign' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/schedule-batch.json',
            'summary'          => 'Schedule a campaign to be sent in batches in the future. Only valid for regular campaigns',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/schedule-batch.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'campaign_id' => array(
                    'description' => 'The campaign id to schedule',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'cid',
                    'required'    => true
                ),
                'schedule_time' => array(
                    'description' => 'The time to schedule the campaign (in 24 hour GMT format). For A/B Split "schedule" campaigns, the time for Group A',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
                'num_batches' => array(
                    'description' => 'The number of batches between 2 and 26 to send (defaults to 2)',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'minimum'     => 2,
                    'maximum'     => 26
                ),
                'stagger_mins' => array(
                    'description' => 'The number of minutes between each batch - 5, 10, 15, 20, 25, 30, or 60 (defaults to 5)',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'enum'        => array(5, 10, 15, 20, 25, 30, 60)
                )
            )
        ),

        'SendCampaign' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/send.json',
            'summary'          => 'Send a given campaign immediately. For RSS campaigns, this will "start" them.',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/send.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'campaign_id' => array(
                    'description' => 'The campaign id to send',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'cid',
                    'required'    => true
                ),
            )
        ),

        'SendTestCampaign' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/send-test.json',
            'summary'          => 'Send a test campaign immediately. For RSS campaigns, this will "start" them.',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/send-test.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'campaign_id' => array(
                    'description' => 'The campaign id to send',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'cid',
                    'required'    => true
                ),
                'test_emails' => array(
                    'description' => 'An array of emails to receive the test campaign',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ),
                'send_type' => array(
                    'description' => 'Specify the format, can be "html" or "text"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => array('html', 'text')
                )
            )
        ),

        'TestSegmentation' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/segment-test.json',
            'summary'          => 'Test segmentation rules before creating a campaign using them',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/segment-test.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'list_id' => array(
                    'description' => 'The list to test segmentation on',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
                'options' => array(
                    'description' => 'An array of emails to receive the test campaign',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                )
            )
        ),

        'UnscheduleCampaign' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/unschedule.json',
            'summary'          => 'Unschedule a campaign that is scheduled to be sent in the future',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/unschedule.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'campaign_id' => array(
                    'description' => 'The campaign id to unschedule',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'cid',
                    'required'    => true
                )
            )
        ),

        'UpdateCampaign' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/update.json',
            'summary'          => 'Update just about any setting besides type for a campaign that has not been sent (there are a few caveats for this method, please refer to the official documentation)',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/update.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'campaign_id' => array(
                    'description' => 'The campaign id to unschedule',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'cid',
                    'required'    => true
                ),
                'name' => array(
                    'description' => 'The parameter name (can be "options", "content" or "segment_opts")',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => array('options', 'content', 'segment_opts')
                ),
                'value' => array(
                    'description' => 'An appropriate set of values for the given parameter',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                )
            )
        ),

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

        'AddListMergeVar' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/merge-var-add.json',
            'summary'          => 'Add a new merge var to a list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/merge-var-add.php',
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
                'tag' => array(
                    'description' => 'The merge tag to add, e.g. FNAME. 10 bytes max, valid characters: "A-Z 0-9 _" no spaces, dashes, etc. Some tags and prefixes are reserved',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'pattern'     => '/^[a-zA-Z0-9_]+$/'
                ),
                'name' => array(
                    'description' => 'The long description of the tag being added, used for user displays',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
                'options' => array(
                    'description' => 'Various options for this merge var',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
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

        'DeleteListMergeVar' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/merge-var-del.json',
            'summary'          => 'Delete an existing merge var to a list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/merge-var-del.php',
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
                'tag' => array(
                    'description' => 'The merge tag to delete',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'pattern'     => '/^[a-zA-Z0-9_]+$/'
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

        'GetListMergeVars' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/merge-vars.json',
            'summary'          => 'Get the list of merge tags for a given list, including their name, tag, and required setting',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/merge-vars.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'id' => array(
                    'description' => 'The list id to retrieve merge vars for',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
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
                    'description' => '"created" (the created date, default) or "web" (the display order in the web app)',
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

        'ResetListMergeVar' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/merge-var-reset.json',
            'summary'          => 'Completely resets all data stored in a merge var on a list. All data is removed and this action can not be undone.',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/merge-var-reset.php',
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
                'tag' => array(
                    'description' => 'The merge tag to reset',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'pattern'     => '/^[a-zA-Z0-9_]+$/'
                )
            )
        ),

        'SetListMergeVar' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/merge-var-set.json',
            'summary'          => 'Sets a particular merge var to the specified value for every list member. Only merge var ids 1 - 30 may be modified this way',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/merge-var-set.php',
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
                'tag' => array(
                    'description' => 'The merge tag to set',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'pattern'     => '/^[a-zA-Z0-9_]+$/'
                ),
                'value' => array(
                    'description' => 'The value of the merge tag',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                )
            )
        ),

        'Unsubscribe' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'lists/unsubscribe.json',
            'summary'          => 'Unsubscribe the given email address from the list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/unsubscribe.php',
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
                    'description' => 'The email to remove',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ),
                'delete_member' => array(
                    'description' => 'Flag to completely delete the member from your list instead of just unsubscribing (default to false)',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ),
                'send_goodbye' => array(
                    'description' => 'Flag to send the goodbye email to the email address (defaults to true)',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ),
                'send_notify' => array(
                    'description' => 'Flag to send the unsubscribe notification email to the address defined in the list email notification settings (defaults to true)',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ),
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

        /**
         * --------------------------------------------------------------------------------
         * ECOMM RELATED OPERATIONS
         * --------------------------------------------------------------------------------
         */

        'AddOrder' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'ecomm/order-add.json',
            'summary'          => 'Import Ecommerce Order Information to be used for Segmentation',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/ecomm/order-add.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'order' => array(
                    'description' => 'Information pertaining to the order that has completed',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ),
            )
        ),

        'DeleteOrder' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'ecomm/order-del.json',
            'summary'          => 'Delete Ecommerce Order Information used for Segmentation',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/ecomm/order-del.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'store_id' => array(
                    'description' => 'The store id the order belongs to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
                'order_id' => array(
                    'description' => 'The order id (generated by the store) to delete',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
            )
        ),

        'GetOrders' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'ecomm/orders.json',
            'summary'          => 'Get Ecommerce Orders Information used for Segmentation',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/ecomm/orders.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'campaign_id' => array(
                    'description' => 'If set, limit the returned orders to a particular campaign',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'sentAs'      => 'cid'
                ),
                'start' => array(
                    'description' => 'For large data sets, the page number to start at - defaults to 1st page of data (page 0)',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'minimum'     => 0
                ),
                'limit' => array(
                    'description' => 'For large data sets, the number of results to return - defaults to 100, upper limit set at 500',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'minimum'     => 0,
                    'maximum'     => 500
                ),
                'since' => array(
                    'description' => 'Pull only messages since this time - 24 hour format in GMT, eg "2013-12-30 20:30:00"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ),
            )
        ),

        /**
         * --------------------------------------------------------------------------------
         * FOLDERS RELATED OPERATIONS
         * --------------------------------------------------------------------------------
         */

        'AddFolder' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'folders/add.json',
            'summary'          => 'Add a new folder to file campaigns, autoresponders, or templates',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/folders/add.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'name' => array(
                    'description' => 'A unique name for a folder (max 100 bytes)',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
                'type' => array(
                    'description' => 'The type of folder to create - one of "campaign", "autoresponder", or "template"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => array('campaign', 'autoresponder', 'template')
                )
            )
        ),

        'DeleteFolder' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'folders/del.json',
            'summary'          => 'Delete a campaign, autoresponder, or template folder',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/folders/del.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'folder_id' => array(
                    'description' => 'The folder id to delete',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'fid',
                    'required'    => true
                ),
                'type' => array(
                    'description' => 'The type of folder to delete - one of "campaign", "autoresponder", or "template"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => array('campaign', 'autoresponder', 'template')
                )
            )
        ),

        'GetFolders' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'folders/list.json',
            'summary'          => 'Get all the folders of a certain type',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/folders/list.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'type' => array(
                    'description' => 'The type of folder to delete - one of "campaign", "autoresponder", or "template"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => array('campaign', 'autoresponder', 'template')
                )
            )
        ),

        'UpdateFolder' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'folders/update.json',
            'summary'          => 'Update a single folder of a certain type',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/folders/update.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'folder_id' => array(
                    'description' => 'The folder id to delete',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'sentAs'      => 'fid',
                    'required'    => true
                ),
                'name' => array(
                    'description' => 'A unique name for a folder (max 100 bytes)',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
                'type' => array(
                    'description' => 'The type of folder to delete - one of "campaign", "autoresponder", or "template"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => array('campaign', 'autoresponder', 'template')
                )
            )
        ),

        /**
         * --------------------------------------------------------------------------------
         * TEMPLATES RELATED OPERATIONS
         * --------------------------------------------------------------------------------
         */

        'AddTemplate' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'templates/add.json',
            'summary'          => 'Create a new user template, NOT campaign content. These templates can then be applied while creating campaigns',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/templates/add.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'name' => array(
                    'description' => 'The name for the template - names must be unique and a max of 50 bytes',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
                'html' => array(
                    'description' => 'A string specifying the entire template to be created. This is NOT campaign content',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
                'folder_id' => array(
                    'description' => 'The folder to put this template on',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                )
            )
        ),

        'DeleteTemplate' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'templates/del.json',
            'summary'          => 'Delete (deactivate) a user template',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/templates/del.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'template_id' => array(
                    'description' => 'The template id to delete',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                )
            )
        ),

        'GetTemplateInfo' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'templates/info.json',
            'summary'          => 'Get details for a specific template to help support editing',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/templates/info.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'template_id' => array(
                    'description' => 'The template id to get info from',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ),
                'type' => array(
                    'description' => 'The template type to load - one of "user", "gallery", "base" (defaults to "user")',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => array('user', 'gallery', 'base')
                )
            )
        ),

        'GetTemplates' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'templates/list.json',
            'summary'          => 'Retrieve various templates available in the system',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/templates/list.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'types' => array(
                    'description' => 'The types of templates to return',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ),
                'filters' => array(
                    'description' => 'Options to control how inactive templates are returned, if at all',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                )
            )
        ),

        'UndeleteTemplate' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'templates/undel.json',
            'summary'          => 'Undelete (reactivate) a user template',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/templates/undel.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'template_id' => array(
                    'description' => 'The template id to reactivate',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                )
            )
        ),

        'UpdateTemplate' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'templates/update.json',
            'summary'          => 'Replace the content of a user template, NOT campaign content',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/templates/update.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'template_id' => array(
                    'description' => 'The template id to reactivate',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ),
                'values' => array(
                    'description' => 'The values to update',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                )
            )
        ),

        /**
         * --------------------------------------------------------------------------------
         * USERS RELATED OPERATIONS
         * --------------------------------------------------------------------------------
         */

        'InviteUser' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'users/invite.json',
            'summary'          => 'Invite a user to your account',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/users/invite.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'email' => array(
                    'description' => 'A valid email address to send the invitation to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
                'role' => array(
                    'description' => 'The role to assign to the user - one of "viewer", "author", "manager", "admin" (defaults to "viewer")',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => array('viewer', 'author', 'manager', 'admin')
                ),
                'message' => array(
                    'description' => 'An optional message to include. Plain text any HTML tags will be stripped',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'msg',
                    'required'    => false
                )
            )
        ),

        'GetInvitations' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'users/invites.json',
            'summary'          => 'Retrieve the list of pending users invitations have been sent for',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/users/invites.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                )
            )
        ),

        'GetLogins' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'users/logins.json',
            'summary'          => 'Retrieve the list of active logins',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/users/logins.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                )
            )
        ),

        'ReinviteUser' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'users/invite-resend.json',
            'summary'          => 'Reinvite a user to your account',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/users/invite-resend.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'email' => array(
                    'description' => 'A valid email address to resend the invitation to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                )
            )
        ),

        'RevokeLogin' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'users/login-revoke.json',
            'summary'          => 'Revoke access for a specified user',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/users/login-revoke.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'username' => array(
                    'description' => 'The username of the login to revoke access of',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                )
            )
        ),

        'RevokeUserInvitation' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'users/invite-revoke.json',
            'summary'          => 'Revoke an invitation that was sent to a user',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/users/invite-revoke.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'email' => array(
                    'description' => 'A valid email address to revoke the invitation from',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                )
            )
        ),

        /**
         * --------------------------------------------------------------------------------
         * VIP RELATED OPERATIONS
         * --------------------------------------------------------------------------------
         */

        'AddVipMembers' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'vip/add.json',
            'summary'          => 'Add VIPs',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/vip/add.php',
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
                    'description' => 'An array of up to 50 email address to add',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true,
                    'maxItems'    => 50
                )
            )
        ),

        'DeleteVipMembers' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'vip/delete.json',
            'summary'          => 'Delete VIPs',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/vip/del.php',
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
                    'description' => 'An array of up to 50 email address to remove',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true,
                    'maxItems'    => 50
                )
            )
        ),

        'GetVipMembers' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'vip/activity.json',
            'summary'          => 'Retrieve all VIPs for an account',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/vip/members.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
            )
        ),

        'GetVipActivity' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'vip/activity.json',
            'summary'          => 'Retrieve all Activity (opens/clicks) for VIPs over the past 10 days',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/vip/activity.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
            )
        ),

        /**
         * --------------------------------------------------------------------------------
         * HELPER RELATED OPERATIONS
         * --------------------------------------------------------------------------------
         */

        'GetAccountDetails' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'helper/account-details.json',
            'summary'          => 'Retrieve lots of account information including payments made, plan info, some account stats, installed modules, contact info, and more. No private information like credit card numbers is available',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/helper/account-details.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ),
                'exclude' => array(
                    'description' => 'Allows controlling which extra arrays are returned since they can slow down calls. Can be ""modules", "orders", "rewards-credits", "rewards-inspections", "rewards-referrals", "rewards-applied" or "integrations"',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false,
                    'items'       => array(
                        'type' => 'string',
                        'enum' => array(
                            'modules', 'orders', 'rewards-credits', 'rewards-inspections',
                            'rewards-referrals', 'rewards-applied', 'integrations'
                        )
                    )
                )
            )
        ),

        'Ping' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'helper/ping.json',
            'summary'          => 'Ping the MailChimp API',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/helper/ping.php',
            'parameters'       => array(
                'api_key'  => array(
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                )
            )
        )
    ),
);
