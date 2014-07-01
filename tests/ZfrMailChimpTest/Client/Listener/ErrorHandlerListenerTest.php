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
        $event        = $this->getMock('GuzzleHttp\Event\ErrorEvent', [], [], '', false);

        $response = $this->getMock('GuzzleHttp\Message\ResponseInterface');

        $event->expects($this->once())->method('getResponse')->will($this->returnValue($response));
        $response->expects($this->once())->method('getStatusCode')->will($this->returnValue(200));

        $this->assertNull($errorHandler->handleError($event));
    }

    public function errorProvider()
    {
        return [
            ['Absplit_UnknownError'],
            ['Absplit_UnknownSplitTest'],
            ['Absplit_UnknownTestType'],
            ['Absplit_UnknownWaitUnit'],
            ['Absplit_UnknownWinnerType'],
            ['Absplit_WinnerNotSelected'],
            ['Avesta_Db_Exception'],
            ['Campaign_BounceMissing'],
            ['Campaign_DoesNotExist'],
            ['Campaign_InvalidAbsplit'],
            ['Campaign_InvalidAuto'],
            ['Campaign_InvalidContent'],
            ['Campaign_InvalidOption'],
            ['Campaign_InvalidRss'],
            ['Campaign_InvalidSegment'],
            ['Campaign_InvalidStatus'],
            ['Campaign_InvalidTemplate'],
            ['Campaign_NotSaved'],
            ['Campaign_StatsNotAvailable'],
            ['Email_AlreadySubscribed'],
            ['Email_AlreadyUnsubscribed'],
            ['Email_NotExists'],
            ['Email_NotSubscribed'],
            ['Invalid_Analytics'],
            ['Invalid_ApiKey'],
            ['Invalid_AppKey'],
            ['Invalid_DateTime'],
            ['Invalid_EcommOrder'],
            ['Invalid_Email'],
            ['Invalid_Folder'],
            ['Invalid_IP'],
            ['Invalid_Options'],
            ['Invalid_PagingLimit'],
            ['Invalid_PagingStart'],
            ['Invalid_SendType'],
            ['Invalid_Template'],
            ['Invalid_TrackingOptions'],
            ['Invalid_URL'],
            ['List_AlreadySubscribed'],
            ['List_CannotRemoveEmailMerge'],
            ['List_DoesNotExist'],
            ['List_InvalidBounceMember'],
            ['List_InvalidImport'],
            ['List_InvalidInterestFieldType'],
            ['List_InvalidInterestGroup'],
            ['List_InvalidMergeField'],
            ['List_InvalidOption'],
            ['List_InvalidUnsubMember'],
            ['List_MergeFieldRequired'],
            ['List_Merge_InvalidMergeID'],
            ['List_NotSubscribed'],
            ['List_TooManyInterestGroups'],
            ['List_TooManyMergeFields'],
            ['MC_ContentImport_InvalidArchive'],
            ['MC_InvalidPayment'],
            ['MC_PastedList_Duplicate'],
            ['MC_PastedList_InvalidImport'],
            ['MC_SearchException'],
            ['Max_Size_Reached'],
            ['Module_Unknown'],
            ['MonthlyPlan_Unknown'],
            ['Order_TypeUnknown'],
            ['PDOException'],
            ['Parse_Exception'],
            ['Request_TimedOut'],
            ['ServerError_InvalidParameters'],
            ['ServerError_MethodUnknown'],
            ['Too_Many_Connections'],
            ['Unknown_Exception'],
            ['User_CannotSendCampaign'],
            ['User_Disabled'],
            ['User_DoesExist'],
            ['User_DoesNotExist'],
            ['User_InvalidAction'],
            ['User_InvalidRole'],
            ['User_MissingEmail'],
            ['User_MissingModuleOutbox'],
            ['User_ModuleAlreadyPurchased'],
            ['User_ModuleNotPurchased'],
            ['User_NotApproved'],
            ['User_NotEnoughCredit'],
            ['User_UnderMaintenance'],
            ['User_Unknown'],
            ['ValidationError'],
            ['XML_RPC2_Exception'],
            ['XML_RPC2_FaultException'],
            ['Zend_Uri_Exception']
        ];
    }

    /**
     * @dataProvider errorProvider
     */
    public function testCanCreateErrors($errorName)
    {
        $errorHandler = new ErrorHandlerListener();
        $event        = $this->getMock('GuzzleHttp\Event\ErrorEvent', [], [], '', false);

        $response = $this->getMock('GuzzleHttp\Message\ResponseInterface');

        $responseData = [
            'name'  => $errorName,
            'code'  => 100, // dummy code just for test
            'error' => 'Error message' // dummy error message just for test
        ];

        $event->expects($this->once())->method('getResponse')->will($this->returnValue($response));
        $response->expects($this->once())->method('json')->will($this->returnValue($responseData));
        $response->expects($this->once())->method('getStatusCode')->will($this->returnValue(400));

        $this->setExpectedException('ZfrMailChimp\Exception\ExceptionInterface', $responseData['error'], $responseData['code']);

        $errorHandler->handleError($event);
    }
}
