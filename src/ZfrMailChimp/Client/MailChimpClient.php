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

namespace ZfrMailChimp\Client;

use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;
use Guzzle\Service\Resource\Model;
use ZfrMailChimp\Version;

/**
 * MailChimp client to interact with MailChimp API
 *
 * CAMPAIGN RELATED METHODS:
 *
 * @method array createCampaign(array $args = array()) {@command MailChimp CreateCampaign}
 * @method array deleteCampaign(array $args = array()) {@command MailChimp DeleteCampaign}
 * @method array getCampaignContent(array $args = array()) {@command MailChimp GetCampaignContent}
 * @method array getCampaigns(array $args = array()) {@command MailChimp GetCampaigns}
 * @method array getTemplateContent(array $args = array()) {@command MailChimp GetTemplateContent}
 * @method array pauseCampaign(array $args = array()) {@command MailChimp PauseCampaign}
 * @method array replicateCampaign(array $args = array()) {@command MailChimp ReplicateCampaign}
 * @method array resumeCampaign(array $args = array()) {@command MailChimp ResumeCampaign}
 * @method array scheduleCampaign(array $args = array()) {@command MailChimp ScheduleCampaign}
 * @method array scheduleBatchCampaign(array $args = array()) {@command MailChimp ScheduleBatchCampaign}
 * @method array sendCampaign(array $args = array()) {@command MailChimp SendCampaign}
 * @method array sendTestCampaign(array $args = array()) {@command MailChimp SendTestCampaign}
 * @method array testSegmentation(array $args = array()) {@command MailChimp TestSegmentation}
 * @method array unscheduleCampaign(array $args = array()) {@command MailChimp UnscheduleCampaign}
 * @method array updateCampaign(array $args = array()) {@command MailChimp UpdateCampaign}
 *
 * LIST RELATED METHODS:
 *
 * @method array addInterestGroup(array $args = array()) {@command MailChimp AddInterestGroup}
 * @method array addInterestGrouping(array $args = array()) {@command MailChimp AddInterestGrouping}
 * @method array batchSubscribe(array $args = array()) {@command MailChimp BatchSubscribe}
 * @method array batchUnsubscribe(array $args = array()) {@command MailChimp BatchUnsubscribe}
 * @method array deleteInterestGroup(array $args = array()) {@command MailChimp DeleteInterestGroup}
 * @method array deleteInterestGrouping(array $args = array()) {@command MailChimp DeleteInterestGrouping}
 * @method array getAbuseReports(array $args = array()) {@command MailChimp GetAbuseReports}
 * @method array getActivity(array $args = array()) {@command MailChimp GetActivity}
 * @method array getClients(array $args = array()) {@command MailChimp GetClients}
 * @method array getGrowthHistory(array $args = array()) {@command MailChimp GetGrowthHistory}
 * @method array getInterestGroupings(array $args = array()) {@command MailChimp GetInterestGroupings}
 * @method array getLists(array $args = array()) {@command MailChimp GetLists}
 * @method array getLocations(array $args = array()) {@command MailChimp GetLocations}
 * @method array getMembers(array $args = array()) {@command MailChimp GetMembers}
 * @method array getMembersActivity(array $args = array()) {@command MailChimp GetMembersActivity}
 * @method array getMembersInfo(array $args = array()) {@command MailChimp GetMembersInfo}
 * @method array updateInterestGroup(array $args = array()) {@command MailChimp UpdateInterestGroup}
 * @method array updateInterestGrouping(array $args = array()) {@command MailChimp UpdateInterestGrouping}
 *
 * ECOMM RELATED METHODS:
 *
 * @method array addOrder(array $args = array()) {@command MailChimp AddOrder}
 * @method array deleteOrder(array $args = array()) {@command MailChimp DeleteOrder}
 * @method array getOrders(array $args = array()) {@command MailChimp GetOrders}
 *
 * FOLDER RELATED METHODS:
 *
 * @method array addFolder(array $args = array()) {@command MailChimp AddFolder}
 * @method array deleteFolder(array $args = array()) {@command MailChimp DeleteFolder}
 * @method array getFolders(array $args = array()) {@command MailChimp GetFolders}
 * @method array updateFolders(array $args = array()) {@command MailChimp UpdateFolders}
 *
 * TEMPLATE RELATED METHODS:
 *
 * @method array addTemplate(array $args = array()) {@command MailChimp AddTemplate}
 * @method array deleteTemplate(array $args = array()) {@command MailChimp DeleteTemplate}
 * @method array getTemplateInfo(array $args = array()) {@command MailChimp GetTemplateInfo}
 * @method array getTemplates(array $args = array()) {@command MailChimp GetTemplates}
 * @method array undeleteTemplate(array $args = array()) {@command MailChimp UndeleteTemplate}
 * @method array updateTemplate(array $args = array()) {@command MailChimp UpdateTemplate}
 *
 * USERS RELATED METHODS:
 *
 * @method array inviteUser(array $args = array()) {@command MailChimp InviteUser}
 * @method array getInvitations(array $args = array()) {@command MailChimp GetInvitations}
 * @method array getLogins(array $args = array()) {@command MailChimp GetLogins}
 * @method array reinviteUser(array $args = array()) {@command MailChimp ReinviteUser}
 * @method array revokeLogin(array $args = array()) {@command MailChimp RevokeLogin}
 * @method array revokeUserInvitation(array $args = array()) {@command MailChimp RevokeUserInvitation}
 *
 * VIP RELATED METHODS:
 *
 * @method array addVipMembers(array $args = array()) {@command MailChimp AddVipMembers}
 * @method array deleteVipMembers(array $args = array()) {@command MailChimp DeleteVipMembers}
 * @method array getVipMembers(array $args = array()) {@command MailChimp GetVipMembers}
 * @method array getVipActivity(array $args = array()) {@command MailChimp GetVipActivity}
 *
 * HELPER RELATED METHODS:
 *
 * @method array getAccountDetails(array $args = array()) {@command MailChimp GetAccountDetails}
 * @method array ping(array $args = array()) {@command MailChimp Ping}
 *
 * @author Michaël Gallego
 * @licence MIT
 */
class MailChimpClient extends Client
{
    /**
     * MailChimp API version
     */
    const LATEST_API_VERSION = '2.0';

    /**
     * @param string $apiKey
     * @param string $version
     */
    public function __construct($apiKey, $version = self::LATEST_API_VERSION)
    {
        // Make sure we always have the app_id parameter as default
        parent::__construct('', array(
            'command.params' => array(
                'api_key' => $apiKey
            )
        ));

        $this->setDescription(ServiceDescription::factory(sprintf(
            __DIR__ . '/ServiceDescription/MailChimp-%s.php',
            $version
        )));

        // Prefix the User-Agent by SDK version
        $this->setUserAgent('zfr-mailchimp-php/' . Version::VERSION, true);

        // The base URL depends on the API key
        $parts = explode('-', $apiKey);
        $this->setBaseUrl(sprintf('https://%s.api.mailchimp.com/%s', end($parts), $version));
    }

    /**
     * {@inheritdoc}
     */
    public function __call($method, $args = array())
    {
        return parent::__call(ucfirst($method), $args);
    }

    /**
     * Get current MailChimp API version
     *
     * @return string
     */
    public function getApiVersion()
    {
        return $this->serviceDescription->getApiVersion();
    }
}
