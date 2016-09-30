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

namespace JuiceKit\Watson;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

abstract class WatsonApi
{
    const URL = 'https://gateway-a.watsonplatform.net/';

    protected $apiKey = null;
    protected $version = null;

    /** @var  ClientInterface */
    private $client;

    /**
     * WatsonApi constructor.
     * @param $apiKey
     * @param $version
     */
    public function __construct($apiKey, $version)
    {
        $this->apiKey = $apiKey;
        $this->version = $version;

        $this->setHttpClient();
    }

    /**
     * @return null
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @return null
     */
    public function getVersion()
    {
        return $this->version;
    }


    public function setHttpClient(ClientInterface $client = null)
    {
        if ($client == null) {
            return $this->client = new Client([
                'base_uri' => self::URL,
            ]);
        }

        $this->client = $client;
    }

    /**
     * @return ClientInterface
     */
    public function getHttpClient()
    {
        return $this->client;
    }


    protected function get($path, array $options = [])
    {
        return $this->buildRequest('GET', $path, $options);
    }

    protected function post($path, array $options = [])
    {
        return $this->buildRequest('POST', $path, $options);
    }

    private function buildRequest($method, $path, array $options = [])
    {
        $opts = [
            'query' => array_merge([
                'api_key' => $this->apiKey,
                'version' => $this->version
            ], isset($options['query']) ? $options['query'] : [])
        ];

        $response = $this->client->request($method, $path, array_merge($options, $opts));

        return \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
    }

}
