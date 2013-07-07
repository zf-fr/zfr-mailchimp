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
 * LIST RELATED METHODS:
 *
 * @method Model addInterestGroup(array $args = array()) {@command MailChimp AddInterestGroup}
 * @method Model addInterestGrouping(array $args = array()) {@command MailChimp AddInterestGrouping}
 * @method Model batchSubscribe(array $args = array()) {@command MailChimp BatchSubscribe}
 * @method Model batchUnsubscribe(array $args = array()) {@command MailChimp BatchUnsubscribe}
 * @method Model deleteInterestGroup(array $args = array()) {@command MailChimp DeleteInterestGroup}
 * @method Model deleteInterestGrouping(array $args = array()) {@command MailChimp DeleteInterestGrouping}
 * @method Model getAbuseReports(array $args = array()) {@command MailChimp GetAbuseReports}
 * @method Model getActivity(array $args = array()) {@command MailChimp GetActivity}
 * @method Model getClients(array $args = array()) {@command MailChimp GetClients}
 * @method Model getGrowthHistory(array $args = array()) {@command MailChimp GetGrowthHistory}
 * @method Model getInterestGroupings(array $args = array()) {@command MailChimp GetInterestGroupings}
 * @method Model getLists(array $args = array()) {@command MailChimp GetLists}
 * @method Model getLocations(array $args = array()) {@command MailChimp GetLocations}
 * @method Model getMembers(array $args = array()) {@command MailChimp GetMembers}
 * @method Model getMembersActivity(array $args = array()) {@command MailChimp GetMembersActivity}
 * @method Model getMembersInfo(array $args = array()) {@command MailChimp GetMembersInfo}
 * @method Model updateInterestGroup(array $args = array()) {@command MailChimp UpdateInterestGroup}
 * @method Model updateInterestGrouping(array $args = array()) {@command MailChimp UpdateInterestGrouping}
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
