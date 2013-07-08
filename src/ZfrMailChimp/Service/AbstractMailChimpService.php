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
use ZfrMailChimp\Service\Exception;

/**
 * @author Michaël Gallego
 */
abstract class AbstractMailChimpService
{
    /**
     * @param  HttpException $exception
     * @throws Exception\RuntimeException
     * @throws Exception\ValidationErrorException
     * @throws Exception\InvalidCredentialsException
     */
    protected function parseException(HttpException $exception)
    {
        $body = json_decode($exception->getResponse()->getBody());

        switch($body->name) {
            case 'Invalid_ApiKey':
                throw new Exception\InvalidCredentialsException(sprintf(
                    'MailChimp authentication error: %s', $body->error
                ), $body->code, $exception);
            case 'ValidationError':
                throw new Exception\ValidationErrorException(sprintf(
                    'A validation error occurred on MailChimp: %s', $body->error
                ), $body->code, $exception);
            default:
                throw new Exception\RuntimeException(sprintf(
                    'An error occurred on MailChimp: %s', $body->error
                ), $body->code, $exception);
        }
    }
}
