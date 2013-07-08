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

namespace ZfrMailChimp\Service;

use Guzzle\Http\Exception\HttpException;
use ZfrMailChimp\Client\MailChimpClient;

/**
 * Simple service for manipulating MailChimp folders, based on top of Guzzle client
 *
 * @author Michaël Gallego
 */
class FolderService extends AbstractMailChimpService
{
    /**
     * @var MailChimpClient
     */
    protected $client;

    /**
     * @param MailChimpClient $client
     */
    public function __construct(MailChimpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Add a new MailChimp folder
     *
     * @param  string $name Name of the folder
     * @param  string $type Type of the folder
     * @return int The identifier of the created folder
     */
    public function addFolder($name, $type)
    {
        try {
            $result = $this->client->addFolder(compact('name', 'type'));
        } catch (HttpException $exception) {
            $this->parseException($exception);
        }

        return $result['folder_id'];
    }

    /**
     * Delete an existing MailChimp folder
     *
     * @param int    $id   Identifier of the folder to delete
     * @param string $type Type of the folder
     * @param bool   True if deletion was successful
     */
    public function deleteFolder($id, $type)
    {
        try {
            $result = $this->client->deleteFolder(array('folder_id' => $id, 'type' => $type));
        } catch (HttpException $exception) {
            $this->parseException($exception);
        }

        return $result['complete'];
    }

    /**
     * Get all the folders
     *
     * @param  string $type Type of the folder
     * @return array An array of folders
     */
    public function getFolders($type)
    {
        try {
            return $this->client->getFolders(compact('type'));
        } catch (HttpException $exception) {
            $this->parseException($exception);
        }
    }

    /**
     * @param int    $id   Identifier of the folder to update
     * @param string $name New name of the folder
     * @param string $type Type of the folder
     */
    public function updateFolder($id, $name, $type)
    {
        try {
            $result = $this->client->updateFolder(array(
                'folder_id' => $id,
                'name'      => $name,
                'type'      => $type
            ));
        } catch (HttpException $exception) {
            $this->parseException($exception);
        }

        return $result['complete'];
    }
}
