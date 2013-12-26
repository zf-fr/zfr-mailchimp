<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * 'AS IS' AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
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

namespace ZfrMailChimp\Client\Listener;

use Guzzle\Common\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Map MailChimp error codes to exceptions
 *
 * @author  Michaël Gallego <mic.gallego@gmail.com>
 * @licence MIT
 */
class ErrorHandlerListener implements EventSubscriberInterface
{
    /**
     * List of MailChimp error codes, that map to a ZfrMailChimp exception
     *
     * @var array
     */
    private $errorMap = array(
        'Absplit_UnknownError'            => 'ZfrMailChimp\Exception\Absplit\UnknownErrorException',
        'Absplit_UnknownSplitTest'        => 'ZfrMailChimp\Exception\Absplit\UnknownSplitTestException',
        'Absplit_UnknownTestType'         => 'ZfrMailChimp\Exception\Absplit\UnknownTestTypeException',
        'Absplit_UnknownWaitUnit'         => 'ZfrMailChimp\Exception\Absplit\UnknownWaitUnitException',
        'Absplit_UnknownWinnerType'       => 'ZfrMailChimp\Exception\Absplit\UnknownWinnerTypeException',
        'Absplit_WinnerNotSelected'       => 'ZfrMailChimp\Exception\Absplit\WinnerNotSelectedException',
        'Avesta_Db_Exception'             => 'ZfrMailChimp\Exception\AvestaDbException',
        'Campaign_BounceMissing'          => 'ZfrMailChimp\Exception\Campaign\BounceMissingException',
        'Campaign_DoesNotExist'           => 'ZfrMailChimp\Exception\Campaign\DoesNotExistException',
        'Campaign_InvalidAbsplit'         => 'ZfrMailChimp\Exception\Campaign\InvalidAbsplitException',
        'Campaign_InvalidAuto'            => 'ZfrMailChimp\Exception\Campaign\InvalidAutoException',
        'Campaign_InvalidContent'         => 'ZfrMailChimp\Exception\Campaign\InvalidContentException',
        'Campaign_InvalidOption'          => 'ZfrMailChimp\Exception\Campaign\InvalidOptionException',
        'Campaign_InvalidRss'             => 'ZfrMailChimp\Exception\Campaign\InvalidRssException',
        'Campaign_InvalidSegment'         => 'ZfrMailChimp\Exception\Campaign\InvalidSegmentException',
        'Campaign_InvalidStatus'          => 'ZfrMailChimp\Exception\Campaign\InvalidStatusException',
        'Campaign_InvalidTemplate'        => 'ZfrMailChimp\Exception\Campaign\InvalidTemplateException',
        'Campaign_NotSaved'               => 'ZfrMailChimp\Exception\Campaign\NotSavedException',
        'Campaign_StatsNotAvailable'      => 'ZfrMailChimp\Exception\Campaign\StatsNotAvailableException',
        'Email_AlreadySubscribed'         => 'ZfrMailChimp\Exception\Email\AlreadySubscribedException',
        'Email_AlreadyUnsubscribed'       => 'ZfrMailChimp\Exception\Email\AlreadyUnsubscribedException',
        'Email_NotExists'                 => 'ZfrMailChimp\Exception\Email\NotExistsException',
        'Email_NotSubscribed'             => 'ZfrMailChimp\Exception\Email\NotSubscribedException',
        'Invalid_Analytics'               => 'ZfrMailChimp\Exception\InvalidAnalyticsException',
        'Invalid_ApiKey'                  => 'ZfrMailChimp\Exception\InvalidApiKeyException',
        'Invalid_AppKey'                  => 'ZfrMailChimp\Exception\InvalidAppKeyException',
        'Invalid_DateTime'                => 'ZfrMailChimp\Exception\InvalidDateTimeException',
        'Invalid_EcommOrder'              => 'ZfrMailChimp\Exception\InvalidEcommOrderException',
        'Invalid_Email'                   => 'ZfrMailChimp\Exception\InvalidEmailException',
        'Invalid_Folder'                  => 'ZfrMailChimp\Exception\InvalidFolderException',
        'Invalid_IP'                      => 'ZfrMailChimp\Exception\InvalidIpException',
        'Invalid_Options'                 => 'ZfrMailChimp\Exception\InvalidOptionsException',
        'Invalid_PagingLimit'             => 'ZfrMailChimp\Exception\InvalidPagingLimitException',
        'Invalid_PagingStart'             => 'ZfrMailChimp\Exception\InvalidPagingStartException',
        'Invalid_SendType'                => 'ZfrMailChimp\Exception\InvalidSendTypeException',
        'Invalid_Template'                => 'ZfrMailChimp\Exception\InvalidTemplateException',
        'Invalid_TrackingOptions'         => 'ZfrMailChimp\Exception\InvalidTrackingOptionsException',
        'Invalid_URL'                     => 'ZfrMailChimp\Exception\InvalidUrlException',
        'List_AlreadySubscribed'          => 'ZfrMailChimp\Exception\Ls\AlreadySubscribedException',
        'List_CannotRemoveEmailMerge'     => 'ZfrMailChimp\Exception\Ls\CannotRemoveEmailMergeException',
        'List_DoesNotExist'               => 'ZfrMailChimp\Exception\Ls\DoesNotExistException',
        'List_InvalidBounceMember'        => 'ZfrMailChimp\Exception\Ls\InvalidBounceMemberException',
        'List_InvalidImport'              => 'ZfrMailChimp\Exception\Ls\InvalidImportException',
        'List_InvalidInterestFieldType'   => 'ZfrMailChimp\Exception\Ls\InvalidInterestFieldTypeException',
        'List_InvalidInterestGroup'       => 'ZfrMailChimp\Exception\Ls\InvalidInterestGroupException',
        'List_InvalidMergeField'          => 'ZfrMailChimp\Exception\Ls\InvalidMergeFieldException',
        'List_InvalidOption'              => 'ZfrMailChimp\Exception\Ls\InvalidOptionException',
        'List_InvalidUnsubMember'         => 'ZfrMailChimp\Exception\Ls\InvalidUnsubMemberException',
        'List_MergeFieldRequired'         => 'ZfrMailChimp\Exception\Ls\MergeFieldRequiredException',
        'List_Merge_InvalidMergeID'       => 'ZfrMailChimp\Exception\Ls\InvalidMergeIdException',
        'List_NotSubscribed'              => 'ZfrMailChimp\Exception\Ls\NotSubscribedException',
        'List_TooManyInterestGroups'      => 'ZfrMailChimp\Exception\Ls\TooManyInterestGroupsException',
        'List_TooManyMergeFields'         => 'ZfrMailChimp\Exception\Ls\TooManyMergeFieldsException',
        'MC_ContentImport_InvalidArchive' => 'ZfrMailChimp\Exception\MC\InvalidArchiveException',
        'MC_InvalidPayment'               => 'ZfrMailChimp\Exception\MC\InvalidPaymentException',
        'MC_PastedList_Duplicate'         => 'ZfrMailChimp\Exception\MC\DuplicateException',
        'MC_PastedList_InvalidImport'     => 'ZfrMailChimp\Exception\MC\InvalidImportException',
        'MC_SearchException'              => 'ZfrMailChimp\Exception\MC\SearchExceptionException',
        'Max_Size_Reached'                => 'ZfrMailChimp\Exception\MaxSizeReachedException',
        'Module_Unknown'                  => 'ZfrMailChimp\Exception\UnknownModuleException',
        'MonthlyPlan_Unknown'             => 'ZfrMailChimp\Exception\UnknownMonthlyPlanException',
        'Order_TypeUnknown'               => 'ZfrMailChimp\Exception\Order\UnknownTypeException',
        'PDOException'                    => 'ZfrMailChimp\Exception\PdoException',
        'Parse_Exception'                 => 'ZfrMailChimp\Exception\ParseException',
        'Request_TimedOut'                => 'ZfrMailChimp\Exception\RequestTimedOutException',
        'ServerError_InvalidParameters'   => 'ZfrMailChimp\Exception\InvalidParametersException',
        'ServerError_MethodUnknown'       => 'ZfrMailChimp\Exception\UnknownMethodException',
        'Too_Many_Connections'            => 'ZfrMailChimp\Exception\TooManyConnectionsException',
        'Unknown_Exception'               => 'ZfrMailChimp\Exception\UnknownException',
        'User_CannotSendCampaign'         => 'ZfrMailChimp\Exception\User\CannotSendCampaignException',
        'User_Disabled'                   => 'ZfrMailChimp\Exception\User\DisabledException',
        'User_DoesExist'                  => 'ZfrMailChimp\Exception\User\DoesExistException',
        'User_DoesNotExist'               => 'ZfrMailChimp\Exception\User\DoesNotExistException',
        'User_InvalidAction'              => 'ZfrMailChimp\Exception\User\InvalidActionException',
        'User_InvalidRole'                => 'ZfrMailChimp\Exception\User\InvalidRoleException',
        'User_MissingEmail'               => 'ZfrMailChimp\Exception\User\MissingEmailException',
        'User_MissingModuleOutbox'        => 'ZfrMailChimp\Exception\User\MissingModuleOutboxException',
        'User_ModuleAlreadyPurchased'     => 'ZfrMailChimp\Exception\User\ModuleAlreadyPurchasedException',
        'User_ModuleNotPurchased'         => 'ZfrMailChimp\Exception\User\ModuleNotPurchasedException',
        'User_NotApproved'                => 'ZfrMailChimp\Exception\User\NotApprovedException',
        'User_NotEnoughCredit'            => 'ZfrMailChimp\Exception\User\NotEnoughCreditException',
        'User_UnderMaintenance'           => 'ZfrMailChimp\Exception\User\UnderMaintenanceException',
        'User_Unknown'                    => 'ZfrMailChimp\Exception\User\UnknownException',
        'ValidationError'                 => 'ZfrMailChimp\Exception\ValidationErrorException',
        'XML_RPC2_Exception'              => 'ZfrMailChimp\Exception\XmlRpc2Exception',
        'XML_RPC2_FaultException'         => 'ZfrMailChimp\Exception\XmlRpc2Exception',
        'Zend_Uri_Exception'              => 'ZfrMailChimp\Exception\ZendUriException',
    );

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array('command.after_send' => 'handleError');
    }

    /**
     * @internal
     * @param  Event $event
     * @return void
     * @throws \ZfrMailChimp\Exception\ExceptionInterface
     */
    public function handleError(Event $event)
    {
        /* @var \Guzzle\Service\Command\CommandInterface $command */
        $command  = $event['command'];
        $response = $command->getResponse();

        if ($response->getStatusCode() === 200) {
            return;
        }

        $result    = $command->toArray();
        $errorName = isset($result['name']) ? $result['name'] : 'Unknown_Exception';

        throw new $this->errorMap[$errorName]($result['error'], $result['code']);
    }
}