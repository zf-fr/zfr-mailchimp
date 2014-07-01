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

return [
    'name'        => 'MailChimp',
    'apiVersion'  => '2.0',
    'description' => 'MailChimp is a cloud provider that allows to send mail campaigns easily',
    'operations'  => [
        /**
         * --------------------------------------------------------------------------------
         * CAMPAIGN RELATED OPERATIONS
         * --------------------------------------------------------------------------------
         */

        'CreateCampaign' => [
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/create.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Create a new draft campaign to send',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/create.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'type' => [
                    'description' => 'Campaign type to create, can be "regular", "plaintext", "absplit", "rss" or "auto"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => ['regular', 'plaintext', 'absplit', 'rss', 'auto']
                ],
                'options' => [
                    'description' => 'Various options to control the call',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
                'content' => [
                    'description' => 'Content for this campaign',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
                'segment_opts' => [
                    'description' => 'Options for segmentation tests',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'type_opts' => [
                    'description' => 'Type specific options',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'DeleteCampaign' => [
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/delete.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Delete an existing campaign',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/delete.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'cid' => [
                    'description' => 'The campaign id to delete',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetCampaignContent' => [
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/content.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Get the content (both html and text) for a campaign either as it would appear in the campaign archive or as the raw, original content',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/content.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'cid' => [
                    'description' => 'The campaign id to get content for',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'options' => [
                    'description' => 'Various options to control the call',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'GetCampaigns' => [
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/list.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Get the list of campaigns and their details matching the specified filters',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/list.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'filters' => [
                    'description' => 'An array of filters to apply to this query',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'options' => [
                    'description' => 'Various options to control the call',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'start' => [
                    'description' => 'Control paging of campaigns, start results at this campaign #, defaults to 1st page of data (page 0)',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'minimum'     => 0
                ],
                'limit' => [
                    'description' => 'Control paging of campaigns, number of compaigns to return with each call, defaults to 25 (max=1000)',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'minimum'     => 0,
                    'maximum'     => 1000
                ],
                'sort_field' => [
                    'description' => 'Can be "create_time", "send_time", "title" or "subject" (defaults to "create_time")',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => ['create_time', 'send_time', 'title', 'subject']
                ],
                'sort_dir' => [
                    'description' => '"desc" for descending (default), "asc" for Ascending',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => ['desc', 'DESC', 'asc', 'ASC']
                ]
            ]
        ],

        'GetTemplateContent' => [
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/template-content.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Get the HTML template content sections for a campaign',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/template-content.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'cid' => [
                    'description' => 'The campaign id to get content for',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ]
        ],

        'PauseCampaign' => [
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/pause.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Pause an AutoResponder or RSS campaign from sending',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/pause.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'cid' => [
                    'description' => 'The campaign id to pause',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ]
        ],

        'ReplicateCampaign' => [
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/replicate.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Replicate a campaign',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/replicate.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'cid' => [
                    'description' => 'The campaign id to replicate',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ]
        ],

        'ResumeCampaign' => [
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/resume.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Resume sending an AutoResponder or RSS campaign',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/resume.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'cid' => [
                    'description' => 'The campaign id to replicate',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ]
        ],

        'ScheduleCampaign' => [
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/schedule.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Schedule a campaign to be sent in the future',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/schedule.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'cid' => [
                    'description' => 'The campaign id to schedule',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'schedule_time' => [
                    'description' => 'The time to schedule the campaign (in 24 hour GMT format). For A/B Split "schedule" campaigns, the time for Group A',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'schedule_time_b' => [
                    'description' => 'The time to schedule the campaign (in 24 hour GMT format). For A/B Split "schedule" campaigns, the time for Group B',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'ScheduleBatchCampaign' => [
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/schedule-batch.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Schedule a campaign to be sent in batches in the future. Only valid for regular campaigns',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/schedule-batch.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'cid' => [
                    'description' => 'The campaign id to schedule',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'schedule_time' => [
                    'description' => 'The time to schedule the campaign (in 24 hour GMT format). For A/B Split "schedule" campaigns, the time for Group A',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'num_batches' => [
                    'description' => 'The number of batches between 2 and 26 to send (defaults to 2)',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'minimum'     => 2,
                    'maximum'     => 26
                ],
                'stagger_mins' => [
                    'description' => 'The number of minutes between each batch - 5, 10, 15, 20, 25, 30, or 60 (defaults to 5)',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'enum'        => [5, 10, 15, 20, 25, 30, 60]
                ]
            ]
        ],

        'SendCampaign' => [
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/send.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Send a given campaign immediately. For RSS campaigns, this will "start" them.',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/send.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'cid' => [
                    'description' => 'The campaign id to send',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ]
        ],

        'SendTestCampaign' => [
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/send-test.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Send a test campaign immediately. For RSS campaigns, this will "start" them.',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/send-test.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'cid' => [
                    'description' => 'The campaign id to send',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'test_emails' => [
                    'description' => 'An array of emails to receive the test campaign',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'send_type' => [
                    'description' => 'Specify the format, can be "html" or "text"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => ['html', 'text']
                ]
            ]
        ],

        'TestSegmentation' => [
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/segment-test.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Test segmentation rules before creating a campaign using them',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/segment-test.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'list_id' => [
                    'description' => 'The list to test segmentation on',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'options' => [
                    'description' => 'An array of emails to receive the test campaign',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ]
            ]
        ],

        'UnscheduleCampaign' => [
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/unschedule.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Unschedule a campaign that is scheduled to be sent in the future',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/unschedule.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'cid' => [
                    'description' => 'The campaign id to unschedule',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'UpdateCampaign' => [
            'httpMethod'       => 'POST',
            'uri'              => 'campaigns/update.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Update just about any setting besides type for a campaign that has not been sent (there are a few caveats for this method, please refer to the official documentation)',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/campaigns/update.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'cid' => [
                    'description' => 'The campaign id to unschedule',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'The parameter name (can be "options", "content" or "segment_opts")',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => ['options', 'content', 'segment_opts']
                ],
                'value' => [
                    'description' => 'An appropriate set of values for the given parameter',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * LIST RELATED OPERATIONS
         * --------------------------------------------------------------------------------
         */

        'AddInterestGroup' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/interest-group-add.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Add a single Interest Group',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/interest-group-add.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'group_name' => [
                    'description' => 'The interest group to add - group names must be unique within a grouping',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'grouping_id' => [
                    'description' => 'The grouping to add the new group to. If not supplied, the first grouping on the list is used.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ]
            ]
        ],

        'AddInterestGrouping' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/interest-grouping-add.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Add a new Interest Grouping',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/interest-grouping-add.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'The interest grouping to add - grouping names must be unique',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'type' => [
                    'description' => 'The type of the grouping to add - one of "checkboxes", "hidden", "dropdown", "radio"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => ['checkboxes', 'hidden', 'dropdown', 'radio']
                ],
                'groups' => [
                    'description' => 'The lists of initial group names to be added - at least 1 is required and the names must be unique within a grouping. If the number takes you over the 60 group limit, an error will be thrown.',
                    'location'    => 'json',
                    'required'    => true
                ]
            ]
        ],

        'AddListMergeVar' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/merge-var-add.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Add a new merge var to a list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/merge-var-add.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'tag' => [
                    'description' => 'The merge tag to add, e.g. FNAME. 10 bytes max, valid characters: "A-Z 0-9 _" no spaces, dashes, etc. Some tags and prefixes are reserved',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'pattern'     => '/^[a-zA-Z0-9_]+$/'
                ],
                'name' => [
                    'description' => 'The long description of the tag being added, used for user displays',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'options' => [
                    'description' => 'Various options for this merge var',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'AddListSegment' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/segment-add.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Save a segment against a list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/segment-add.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'opts' => [
                    'description' => 'Options for the new segment',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'AddListWebhook' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/webhook-add.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Add a new webhook URL to the given list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/webhook-add.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'url' => [
                    'description' => 'A valid URL for the webhook',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'actions' => [
                    'description' => 'Actions to fire this webhook for',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'sources' => [
                    'description' => 'Sources to fire this webhook for',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ]
            ]
        ],

        'AddStaticListSegment' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/static-segment-add.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Save a static segment against a list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/static-segment-add.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'Name for the new segment',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'AddStaticSegmentMembers' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/static-segment-members-add.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Add list members to a static segment.',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/static-segment-members-add.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'seg_id' => [
                    'description' => 'The id of the static segment to reset',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'batch' => [
                    'description' => 'Array of structs for each address',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
            ],
        ],

        'BatchSubscribe' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/batch-subscribe.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Subscribe a batch of email addresses to a list at once',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/batch-subscribe.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'batch' => [
                    'description' => 'Array of structs for each address',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
                'double_optin' => [
                    'description' => 'Flag to control whether to send an opt-in confirmation email - defaults to true',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'update_existing' => [
                    'description' => 'Flag to control whether to update members that are already subscribed to the list or to return an error - defaults to false',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'replace_interests' => [
                    'description' => 'flag to determine whether we replace the interest groups with the updated groups provided, or we add the provided groups to the member\'s interest groups - defaults to true',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ]
        ],

        'BatchUnsubscribe' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/batch-unsubscribe.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Unsubscribe a batch of email addresses to a list at once',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/batch-unsubscribe.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'batch' => [
                    'description' => 'Array of structs for each address',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
                'delete_member' => [
                    'description' => 'Flag to completely delete the member from your list instead of just unsubscribing - default to false',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'send_goodbye' => [
                    'description' => 'Flag to send the goodbye email to the email addresses - defaults to true',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'send_notify' => [
                    'description' => 'Flag to send the unsubscribe notification email to the address defined in the list email notification settings - defaults to false',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ]
        ],

        'DeleteInterestGroup' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/interest-group-del.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Delete a single Interest Group',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/interest-group-del.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'group_name' => [
                    'description' => 'The interest group to delete - group names must be unique within a grouping',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'grouping_id' => [
                    'description' => 'The grouping to delete the group from. If not supplied, the first grouping on the list is used.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ]
            ]
        ],

        'DeleteInterestGrouping' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/interest-grouping-del.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Delete a single Interest Grouping',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/interest-grouping-del.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'grouping_id' => [
                    'description' => 'The interest grouping id to delete',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'DeleteListMergeVar' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/merge-var-del.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Delete an existing merge var to a list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/merge-var-del.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'tag' => [
                    'description' => 'The merge tag to delete',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'pattern'     => '/^[a-zA-Z0-9_]+$/'
                ]
            ]
        ],

        'DeleteListSegment' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/segment-del.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Delete a list segment',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/segment-del.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'seg_id' => [
                    'description' => 'The segment id to delete',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'DeleteListWebhook' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/webhook-del.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Delete an existing webhook URL from the given list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/webhook-del.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'url' => [
                    'description' => 'A valid URL for the webhook',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'DeleteStaticSegmentMembers' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/static-segment-members-del.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Delete a members from list segment',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/static-segment-members-del.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'seg_id' => [
                    'description' => 'The segment id to delete members from',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'batch' => [
                    'description' => 'Array of structs for each address',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
            ]
        ],

        'GetAbuseReports' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/abuse-reports.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Get all email addresses that complained about a campaign sent to a list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/abuse-reports.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to pull abuse reports for',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'start' => [
                    'description' => 'Optional for large data sets, the page number to start at - defaults to 1st page of data (page 0)',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'minimum'     => 0
                ],
                'limit' => [
                    'description' => 'Optional for large data sets, the number of results to return - defaults to 500, upper limit set at 1000',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'minimum'     => 0,
                    'maximum'     => 1000
                ],
            ]
        ],

        'GetInterestGroupings' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/interest-groupings.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Get the interest groupings',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/interest-groupings.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'counts' => [
                    'description' => 'Whether or not to return subscriber counts for each group. Defaults to false since that slows this call down a ton for large lists.',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ]
        ],

        'GetListActivity' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/activity.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Access up to the previous 180 days of daily detailed aggregated activity stats for a given list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/activity.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetListClients' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/clients.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Retrieve the clients that the list\'s subscribers have been tagged as being used based on user agents seen',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/clients.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetListGrowthHistory' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/growth-history.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Access the growth history by month for a given list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/growth-history.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetListMergeVars' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/merge-vars.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Get the list of merge tags for a given list, including their name, tag, and required setting',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/merge-vars.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to retrieve merge vars for',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
            ]
        ],

        'GetLists' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/list.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Retrieve all of the lists defined for your user account',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/list.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'filters' => [
                    'description' => 'Filters to apply for this query',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'start' => [
                    'description' => 'Control paging of lists, start results at this list #, defaults to 1st page of data (page 0)',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'minimum'     => 0
                ],
                'limit' => [
                    'description' => 'Control paging of lists, number of lists to return with each call, defaults to 25 (max=100)',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'minimum'     => 0,
                    'maximum'     => 100
                ],
                'sort_field' => [
                    'description' => '"created" (the created date, default) or "web" (the display order in the web app)',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => ['created', 'web']
                ],
                'sort_dir' => [
                    'description' => '"desc" for descending (default), "asc" for Ascending',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => ['desc', 'DESC', 'asc', 'ASC']
                ]
            ]
        ],

        'GetListLocations' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/locations.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Retrieve the locations (countries) that the list\'s subscribers have been tagged to based on geocoding their IP address',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/locations.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ]
        ],

        'GetListMembers' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/members.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Get all of the list members for a list that are of a particular status and potentially matching a segment. This will cause locking, so don\'t run multiples at once.',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/members.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'status' => [
                    'description' => 'The status to get members of (can be "subscribed", "unsubscribed" or "cleaned")',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => ['subscribed', 'unsubscribed', 'cleaned']
                ],
                'opts' => [
                    'description' => 'Various options for controlling returned data',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'GetListMembersActivity' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/member-activity.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Get the most recent 100 activities for particular list members (open, click, bounce, unsub, abuse, sent to, etc.)',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/member-activity.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'emails' => [
                    'description' => 'An array of up to 50 email address struct to retrieve activity information for',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true,
                    'maxItems'    => 50
                ]
            ]
        ],

        'GetListMembersInfo' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/member-info.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Get all the information for particular members of a list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/member-info.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'emails' => [
                    'description' => 'An array of up to 50 email address struct to retrieve member information for',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true,
                    'maxItems'    => 50
                ]
            ]
        ],

        'GetListSegments' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/segments.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Get all the segments for a given list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/segments.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'type' => [
                    'description' => 'Should be either "static" or "saved"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => ['static', 'saved']
                ]
            ]
        ],

        'GetListStaticSegments' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/static-segments.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Get all the static segments for a given list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/static-segments.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetListWebhooks' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/webhooks.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Get all the webhooks URL for the given list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/webhooks.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'ResetListMergeVar' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/merge-var-reset.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Completely resets all data stored in a merge var on a list. All data is removed and this action can not be undone.',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/merge-var-reset.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'tag' => [
                    'description' => 'The merge tag to reset',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'pattern'     => '/^[a-zA-Z0-9_]+$/'
                ]
            ]
        ],

        'ResetStaticSegment' => [
            'httpMethod'        => 'POST',
            'uri'               => 'lists/static-segment-reset.json',
            'responseModel'    => 'GetResponse',
            'summary'           => 'Resets a static segment - removes all members from the static segment. Note: does not actually affect list member data',
            'documentationUrl'  => 'http://apidocs.mailchimp.com/api/2.0/lists/static-segment-reset.php',
            'parameters'        => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'seg_id' => [
                    'description' => 'The id of the static segment to reset',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
        ],

        'SetListMergeVar' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/merge-var-set.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Sets a particular merge var to the specified value for every list member. Only merge var ids 1 - 30 may be modified this way',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/merge-var-set.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'tag' => [
                    'description' => 'The merge tag to set',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'pattern'     => '/^[a-zA-Z0-9_]+$/'
                ],
                'value' => [
                    'description' => 'The value of the merge tag',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                ]
            ]
        ],

        'Subscribe' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/subscribe.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Subscribe the given email address to the list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/subscribe.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'email' => [
                    'description' => 'An array containing data about the email',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
                'merge_vars' => [
                    'description' => 'Optional merge variables to the email',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'email_type' => [
                    'description' => 'Email type preference for the email',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => ['html', 'text']
                ],
                'double_optin' => [
                    'description' => 'Flag to control whether to send an opt-in confirmation email - defaults to true',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'update_existing' => [
                    'description' => 'Flag to control whether to update members that are already subscribed to the list or to return an error - defaults to false',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'replace_interests' => [
                    'description' => 'Flag to determine whether we replace the interest groups with the updated groups provided, or we add the provided groups to the member\'s interest groups - defaults to true',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'send_welcome'    => [
                    'description' => 'Decide wether to send a send welcome email',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ]
        ],

        'TestListSegment' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/segment-test.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Allow to test segmentation rules before creating a campaign using them',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/segment-test.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'list_id' => [
                    'description' => 'The list id to test segmentation on',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'options' => [
                    'description' => 'Options for testing the segment',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'Unsubscribe' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/unsubscribe.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Unsubscribe the given email address from the list',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/unsubscribe.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'email' => [
                    'description' => 'An array containing data about the email to remove',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
                'delete_member' => [
                    'description' => 'Flag to completely delete the member from your list instead of just unsubscribing (default to false)',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'send_goodbye' => [
                    'description' => 'Flag to send the goodbye email to the email address (defaults to true)',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
                'send_notify' => [
                    'description' => 'Flag to send the unsubscribe notification email to the address defined in the list email notification settings (defaults to true)',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ],
            ]
        ],

        'UpdateInterestGroup' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/interest-group-update.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Update a single Interest Group',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/interest-group-update.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'old_name' => [
                    'description' => 'The interest group name to be changed',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'new_name' => [
                    'description' => 'The interest group name to be set',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'grouping_id' => [
                    'description' => 'The grouping to update the group from. If not supplied, the first grouping on the list is used.',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ]
            ]
        ],

        'UpdateInterestGrouping' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/interest-grouping-update.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Update a single Interest Grouping',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/interest-grouping-update.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'grouping_id' => [
                    'description' => 'The grouping id to update',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'The name of the field to update - either "name" or "type"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => ['name', 'type']
                ],
                'value' => [
                    'description' => 'The new value of the field',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                ]
            ]
        ],

        'UpdateListMember' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/update-member.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Edit the email address, merge fields, and interest groups for a list member',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/update-member.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'email' => [
                    'description' => 'An array containing data about the email',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
                'merge_vars' => [
                    'description' => 'New field values to update the member with',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
                'email_type' => [
                    'description' => 'Email type preference for the email',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => ['html', 'text']
                ],
                'replace_interests' => [
                    'description' => 'Flag to determine whether we replace the interest groups with the updated groups provided, or we add the provided groups to the member\'s interest groups - defaults to true',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false
                ]
            ]
        ],

        'UpdateListSegment' => [
            'httpMethod'       => 'POST',
            'uri'              => 'lists/segment-update.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Update an existing segment (the list and type can not be changed)',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/lists/segment-update.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'seg_id' => [
                    'description' => 'The segment id to update',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'opts' => [
                    'description' => 'Options for the new segment',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * ECOMM RELATED OPERATIONS
         * --------------------------------------------------------------------------------
         */

        'AddOrder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'ecomm/order-add.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Import Ecommerce Order Information to be used for Segmentation',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/ecomm/order-add.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'order' => [
                    'description' => 'Information pertaining to the order that has completed',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
            ]
        ],

        'DeleteOrder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'ecomm/order-del.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Delete Ecommerce Order Information used for Segmentation',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/ecomm/order-del.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'store_id' => [
                    'description' => 'The store id the order belongs to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'The order id (generated by the store) to delete',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ]
        ],

        'GetOrders' => [
            'httpMethod'       => 'POST',
            'uri'              => 'ecomm/orders.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Get Ecommerce Orders Information used for Segmentation',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/ecomm/orders.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'cid' => [
                    'description' => 'If set, limit the returned orders to a particular campaign',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'start' => [
                    'description' => 'For large data sets, the page number to start at - defaults to 1st page of data (page 0)',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'minimum'     => 0
                ],
                'limit' => [
                    'description' => 'For large data sets, the number of results to return - defaults to 100, upper limit set at 500',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                    'minimum'     => 0,
                    'maximum'     => 500
                ],
                'since' => [
                    'description' => 'Pull only messages since this time - 24 hour format in GMT, eg "2013-12-30 20:30:00"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * FOLDERS RELATED OPERATIONS
         * --------------------------------------------------------------------------------
         */

        'AddFolder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'folders/add.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Add a new folder to file campaigns, autoresponders, or templates',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/folders/add.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'A unique name for a folder (max 100 bytes)',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'type' => [
                    'description' => 'The type of folder to create - one of "campaign", "autoresponder", or "template"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => ['campaign', 'autoresponder', 'template']
                ]
            ]
        ],

        'DeleteFolder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'folders/del.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Delete a campaign, autoresponder, or template folder',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/folders/del.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'fid' => [
                    'description' => 'The folder id to delete',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'type' => [
                    'description' => 'The type of folder to delete - one of "campaign", "autoresponder", or "template"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => ['campaign', 'autoresponder', 'template']
                ]
            ]
        ],

        'GetFolders' => [
            'httpMethod'       => 'POST',
            'uri'              => 'folders/list.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Get all the folders of a certain type',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/folders/list.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'type' => [
                    'description' => 'The type of folder to retrieve - one of "campaign", "autoresponder", or "template"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => ['campaign', 'autoresponder', 'template']
                ]
            ]
        ],

        'UpdateFolder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'folders/update.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Update a single folder of a certain type',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/folders/update.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'fid' => [
                    'description' => 'The folder id to delete',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'A unique name for a folder (max 100 bytes)',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'type' => [
                    'description' => 'The type of folder to delete - one of "campaign", "autoresponder", or "template"',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => ['campaign', 'autoresponder', 'template']
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * TEMPLATES RELATED OPERATIONS
         * --------------------------------------------------------------------------------
         */

        'AddTemplate' => [
            'httpMethod'       => 'POST',
            'uri'              => 'templates/add.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Create a new user template, NOT campaign content. These templates can then be applied while creating campaigns',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/templates/add.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'The name for the template - names must be unique and a max of 50 bytes',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'html' => [
                    'description' => 'A string specifying the entire template to be created. This is NOT campaign content',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'folder_id' => [
                    'description' => 'The folder to put this template on',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false
                ]
            ]
        ],

        'DeleteTemplate' => [
            'httpMethod'       => 'POST',
            'uri'              => 'templates/del.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Delete (deactivate) a user template',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/templates/del.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'template_id' => [
                    'description' => 'The template id to delete',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'GetTemplateInfo' => [
            'httpMethod'       => 'POST',
            'uri'              => 'templates/info.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Get details for a specific template to help support editing',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/templates/info.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'template_id' => [
                    'description' => 'The template id to get info from',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'type' => [
                    'description' => 'The template type to load - one of "user", "gallery", "base" (defaults to "user")',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => ['user', 'gallery', 'base']
                ]
            ]
        ],

        'GetTemplates' => [
            'httpMethod'       => 'POST',
            'uri'              => 'templates/list.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Retrieve various templates available in the system',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/templates/list.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'types' => [
                    'description' => 'The types of templates to return',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ],
                'filters' => [
                    'description' => 'Options to control how inactive templates are returned, if at all',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'UndeleteTemplate' => [
            'httpMethod'       => 'POST',
            'uri'              => 'templates/undel.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Undelete (reactivate) a user template',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/templates/undel.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'template_id' => [
                    'description' => 'The template id to reactivate',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'UpdateTemplate' => [
            'httpMethod'       => 'POST',
            'uri'              => 'templates/update.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Replace the content of a user template, NOT campaign content',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/templates/update.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'template_id' => [
                    'description' => 'The template id to reactivate',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'values' => [
                    'description' => 'The values to update',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * REPORTS RELATED OPERATIONS
         * --------------------------------------------------------------------------------
         */

        'GetCampaignAbuseReport' => [
            'httpMethod'       => 'POST',
            'uri'              => 'reports/abuse.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Get all email addresses that complained about a given campaign',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/reports/abuse.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'cid' => [
                    'description' => 'Campaign id to pull abuse report for',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'opts' => [
                    'description' => 'Optional options to control returned data',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'GetCampaignAdviceReport' => [
            'httpMethod'       => 'POST',
            'uri'              => 'reports/advice.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Retrieve the text presented in MailChimp app for how a campaign performed and any advice they may have for you',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/reports/advice.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'cid' => [
                    'description' => 'Campaign id to pull abuse report for',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetCampaignBounceMessage' => [
            'httpMethod'       => 'POST',
            'uri'              => 'reports/bounce-message.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Retrieve the most recent full bounce message for a specific email address on the given campaign',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/reports/bounce-message.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'cid' => [
                    'description' => 'Campaign id to pull bounce for',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'email' => [
                    'description' => 'An array containing data about the email',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ]
            ]
        ],

        'GetCampaignBounceMessages' => [
            'httpMethod'       => 'POST',
            'uri'              => 'reports/bounce-messages.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Retrieve the bounce messages for a given campaign',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/reports/bounce-messages.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'cid' => [
                    'description' => 'Campaign id to pull bounce for',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'opts' => [
                    'description' => 'Optional options to control returned data',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        'GetCampaignSummaryReport' => [
            'httpMethod'       => 'POST',
            'uri'              => 'reports/summary.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Retrieve aggregate campaign statistics (opens, bounces, clicks...)',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/reports/summary.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'cid' => [
                    'description' => 'Campaign id to pull stats for',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'GetCampaignGoogleAnalyticsReport' => [
            'httpMethod'       => 'POST',
            'uri'              => 'reports/google-analytics.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Retrieve the Google Analytics data for this campaign',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/reports/google-analytics.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'cid' => [
                    'description' => 'Campaign id to pull Google Analytics report for',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * USERS RELATED OPERATIONS
         * --------------------------------------------------------------------------------
         */

        'InviteUser' => [
            'httpMethod'       => 'POST',
            'uri'              => 'users/invite.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Invite a user to your account',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/users/invite.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'email' => [
                    'description' => 'A valid email address to send the invitation to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'role' => [
                    'description' => 'The role to assign to the user - one of "viewer", "author", "manager", "admin" (defaults to "viewer")',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => ['viewer', 'author', 'manager', 'admin']
                ],
                'msg' => [
                    'description' => 'An optional message to include. Plain text any HTML tags will be stripped',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'GetInvitations' => [
            'httpMethod'       => 'POST',
            'uri'              => 'users/invites.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Retrieve the list of pending users invitations have been sent for',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/users/invites.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ]
            ]
        ],

        'GetLogins' => [
            'httpMethod'       => 'POST',
            'uri'              => 'users/logins.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Retrieve the list of active logins',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/users/logins.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ]
            ]
        ],

        'GetProfile' => [
            'httpMethod'       => 'POST',
            'uri'              => 'users/profile.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Retrieve the profile for the login owning the provided API Key',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/users/profile.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ]
            ]
        ],

        'ReinviteUser' => [
            'httpMethod'       => 'POST',
            'uri'              => 'users/invite-resend.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Reinvite a user to your account',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/users/invite-resend.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'email' => [
                    'description' => 'A valid email address to resend the invitation to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'RevokeLogin' => [
            'httpMethod'       => 'POST',
            'uri'              => 'users/login-revoke.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Revoke access for a specified user',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/users/login-revoke.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'username' => [
                    'description' => 'The username of the login to revoke access of',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'RevokeUserInvitation' => [
            'httpMethod'       => 'POST',
            'uri'              => 'users/invite-revoke.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Revoke an invitation that was sent to a user',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/users/invite-revoke.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'email' => [
                    'description' => 'A valid email address to revoke the invitation from',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * VIP RELATED OPERATIONS
         * --------------------------------------------------------------------------------
         */

        'AddVipMembers' => [
            'httpMethod'       => 'POST',
            'uri'              => 'vip/add.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Add VIPs',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/vip/add.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'emails' => [
                    'description' => 'An array of up to 50 email address to add',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true,
                    'maxItems'    => 50
                ]
            ]
        ],

        'DeleteVipMembers' => [
            'httpMethod'       => 'POST',
            'uri'              => 'vip/delete.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Delete VIPs',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/vip/del.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'The list id to connect to',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'emails' => [
                    'description' => 'An array of up to 50 email address to remove',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true,
                    'maxItems'    => 50
                ]
            ]
        ],

        'GetVipMembers' => [
            'httpMethod'       => 'POST',
            'uri'              => 'vip/activity.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Retrieve all VIPs for an account',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/vip/members.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
            ]
        ],

        'GetVipActivity' => [
            'httpMethod'       => 'POST',
            'uri'              => 'vip/activity.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Retrieve all Activity (opens/clicks) for VIPs over the past 10 days',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/vip/activity.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * GALLERY RELATED OPERATION
         * --------------------------------------------------------------------------------
         */

        'GetGalleryImages' => [
            'httpMethod'       => 'POST',
            'uri'              => 'gallery/list.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Get a list of gallery images, optionally filtered by criterias',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/gallery/list.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'opts' => [
                    'description' => 'Optional options to filter gallery images',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * HELPER RELATED OPERATIONS
         * --------------------------------------------------------------------------------
         */

        'GetAccountDetails' => [
            'httpMethod'       => 'POST',
            'uri'              => 'helper/account-details.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Retrieve lots of account information including payments made, plan info, some account stats, installed modules, contact info, and more. No private information like credit card numbers is available',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/helper/account-details.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ],
                'exclude' => [
                    'description' => 'Allows controlling which extra arrays are returned since they can slow down calls. Can be ""modules", "orders", "rewards-credits", "rewards-inspections", "rewards-referrals", "rewards-applied" or "integrations"',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false,
                    'items'       => [
                        'type' => 'string',
                        'enum' => [
                            'modules', 'orders', 'rewards-credits', 'rewards-inspections',
                            'rewards-referrals', 'rewards-applied', 'integrations'
                        ]
                    ]
                ]
            ]
        ],

        'Ping' => [
            'httpMethod'       => 'POST',
            'uri'              => 'helper/ping.json',
            'responseModel'    => 'GetResponse',
            'summary'          => 'Ping the MailChimp API',
            'documentationUrl' => 'http://apidocs.mailchimp.com/api/2.0/helper/ping.php',
            'parameters'       => [
                'api_key'  => [
                    'description' => 'MailChimp API key',
                    'location'    => 'json',
                    'type'        => 'string',
                    'sentAs'      => 'apikey',
                    'required'    => true
                ]
            ]
        ]
    ],
    'models' => [
        'GetResponse' => [
            'type'                 => 'object',
            'additionalProperties' => [
                'location' => 'json'
            ]
        ]
    ]
];
