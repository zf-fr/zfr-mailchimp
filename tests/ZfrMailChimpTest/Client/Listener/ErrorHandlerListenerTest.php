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

namespace ZfrMailChimpTest\Client\Listener;

use Guzzle\Common\Event;
use PHPUnit_Framework_TestCase;
use ZfrMailChimp\Client\Listener\ErrorHandlerListener;

/**
 * @author  Michaël Gallego <mic.gallego@gmail.com>
 * @licence MIT
 */
class ErrorHandlerListenerTest extends PHPUnit_Framework_TestCase
{
    public function testReturnsNothingIfStatusCodeIs200()
    {
        $errorHandler = new ErrorHandlerListener();
        $event        = new Event();

        $response = $this->getMock('Guzzle\Http\Message\Response', array(), array(), '', false);
        $command  = $this->getMock('Guzzle\Service\Command\CommandInterface');

        $command->expects($this->once())->method('getResponse')->will($this->returnValue($response));
        $response->expects($this->once())->method('getStatusCode')->will($this->returnValue(200));

        $event['command'] = $command;

        $this->assertNull($errorHandler->handleError($event));
    }

    public function errorProvider()
    {
        return array(
            array('Absplit_UnknownError'),
            array('Absplit_UnknownSplitTest'),
            array('Absplit_UnknownTestType'),
            array('Absplit_UnknownWaitUnit'),
            array('Absplit_UnknownWinnerType'),
            array('Absplit_WinnerNotSelected'),
            array('Avesta_Db_Exception'),
            array('Campaign_BounceMissing'),
            array('Campaign_DoesNotExist'),
            array('Campaign_InvalidAbsplit'),
            array('Campaign_InvalidAuto'),
            array('Campaign_InvalidContent'),
            array('Campaign_InvalidOption'),
            array('Campaign_InvalidRss'),
            array('Campaign_InvalidSegment'),
            array('Campaign_InvalidStatus'),
            array('Campaign_InvalidTemplate'),
            array('Campaign_NotSaved'),
            array('Campaign_StatsNotAvailable'),
            array('Email_AlreadySubscribed'),
            array('Email_AlreadyUnsubscribed'),
            array('Email_NotExists'),
            array('Email_NotSubscribed'),
            array('Invalid_Analytics'),
            array('Invalid_ApiKey'),
            array('Invalid_AppKey'),
            array('Invalid_DateTime'),
            array('Invalid_EcommOrder'),
            array('Invalid_Email'),
            array('Invalid_Folder'),
            array('Invalid_IP'),
            array('Invalid_Options'),
            array('Invalid_PagingLimit'),
            array('Invalid_PagingStart'),
            array('Invalid_SendType'),
            array('Invalid_Template'),
            array('Invalid_TrackingOptions'),
            array('Invalid_URL'),
            array('List_AlreadySubscribed'),
            array('List_CannotRemoveEmailMerge'),
            array('List_DoesNotExist'),
            array('List_InvalidBounceMember'),
            array('List_InvalidImport'),
            array('List_InvalidInterestFieldType'),
            array('List_InvalidInterestGroup'),
            array('List_InvalidMergeField'),
            array('List_InvalidOption'),
            array('List_InvalidUnsubMember'),
            array('List_MergeFieldRequired'),
            array('List_Merge_InvalidMergeID'),
            array('List_NotSubscribed'),
            array('List_TooManyInterestGroups'),
            array('List_TooManyMergeFields'),
            array('MC_ContentImport_InvalidArchive'),
            array('MC_InvalidPayment'),
            array('MC_PastedList_Duplicate'),
            array('MC_PastedList_InvalidImport'),
            array('MC_SearchException'),
            array('Max_Size_Reached'),
            array('Module_Unknown'),
            array('MonthlyPlan_Unknown'),
            array('Order_TypeUnknown'),
            array('PDOException'),
            array('Parse_Exception'),
            array('Request_TimedOut'),
            array('ServerError_InvalidParameters'),
            array('ServerError_MethodUnknown'),
            array('Too_Many_Connections'),
            array('Unknown_Exception'),
            array('User_CannotSendCampaign'),
            array('User_Disabled'),
            array('User_DoesExist'),
            array('User_DoesNotExist'),
            array('User_InvalidAction'),
            array('User_InvalidRole'),
            array('User_MissingEmail'),
            array('User_MissingModuleOutbox'),
            array('User_ModuleAlreadyPurchased'),
            array('User_ModuleNotPurchased'),
            array('User_NotApproved'),
            array('User_NotEnoughCredit'),
            array('User_UnderMaintenance'),
            array('User_Unknown'),
            array('ValidationError'),
            array('XML_RPC2_Exception'),
            array('XML_RPC2_FaultException'),
            array('Zend_Uri_Exception')
        );
    }

    /**
     * @dataProvider errorProvider
     */
    public function testCanCreateErrors($errorName)
    {
        $errorHandler = new ErrorHandlerListener();
        $event        = new Event();

        $response = $this->getMock('Guzzle\Http\Message\Response', array(), array(), '', false);
        $command  = $this->getMock('Guzzle\Service\Command\CommandInterface');

        $responseData = array(
            'name'  => $errorName,
            'code'  => 100, // dummy code just for test
            'error' => 'Error message' // dummy error message just for test
        );

        $command->expects($this->once())->method('getResponse')->will($this->returnValue($response));
        $command->expects($this->once())->method('toArray')->will($this->returnValue($responseData));
        $response->expects($this->once())->method('getStatusCode')->will($this->returnValue(400));

        $event['command'] = $command;

        $this->setExpectedException('ZfrMailChimp\Exception\ExceptionInterface', $responseData['error'], $responseData['code']);

        $errorHandler->handleError($event);
    }
} 