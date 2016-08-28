<?php
/**
 * Copyright 2016 Yoel Nunez <dev@nunez.guru>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 */

namespace JuiceKit\Test\Watson;


use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

class MockHttpClient implements ClientInterface
{
    private $requests = [];
    private $responses = [];

    /**
     * MockHttpClient constructor.
     * @param array $responses
     */
    public function __construct(array $responses = array())
    {
        $this->responses = $responses;
    }

    public function pushResponse(ResponseInterface $response)
    {
        array_push($this->responses, $response);
    }

    public function getRequest()
    {
        return array_shift($this->requests);
    }


    /**
     * Create and send an HTTP request.
     *
     * Use an absolute path to override the base path of the client, or a
     * relative path to append to the base path of the client. The URL can
     * contain the query string as well.
     *
     * @param string $method HTTP method.
     * @param string|UriInterface $uri URI object or string.
     * @param array $options Request options to apply.
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function request($method, $uri, array $options = [])
    {
        array_push($this->requests, array(
            'type' => $method,
            'uri' => $uri,
            'options' => $options
        ));

        return array_shift($this->responses);

    }

    /**
     * Send an HTTP request.
     *
     * @param RequestInterface $request Request to send
     * @param array $options Request options to apply to the given
     *                                  request and to the transfer.
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function send(RequestInterface $request, array $options = [])
    {
        // TODO: Implement send() method.
    }

    /**
     * Asynchronously send an HTTP request.
     *
     * @param RequestInterface $request Request to send
     * @param array $options Request options to apply to the given
     *                                  request and to the transfer.
     *
     * @return PromiseInterface
     */
    public function sendAsync(RequestInterface $request, array $options = [])
    {
        // TODO: Implement sendAsync() method.
    }

    /**
     * Create and send an asynchronous HTTP request.
     *
     * Use an absolute path to override the base path of the client, or a
     * relative path to append to the base path of the client. The URL can
     * contain the query string as well. Use an array to provide a URL
     * template and additional variables to use in the URL template expansion.
     *
     * @param string $method HTTP method
     * @param string|UriInterface $uri URI object or string.
     * @param array $options Request options to apply.
     *
     * @return PromiseInterface
     */
    public function requestAsync($method, $uri, array $options = [])
    {
        // TODO: Implement requestAsync() method.
    }

    /**
     * Get a client configuration option.
     *
     * These options include default request options of the client, a "handler"
     * (if utilized by the concrete client), and a "base_uri" if utilized by
     * the concrete client.
     *
     * @param string|null $option The config option to retrieve.
     *
     * @return mixed
     */
    public function getConfig($option = null)
    {
        // TODO: Implement getConfig() method.
    }
}