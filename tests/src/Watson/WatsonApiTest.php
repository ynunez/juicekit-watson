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


use JuiceKit\Test\Watson\Mock\HttpClient as MockHttpClient;
use JuiceKit\Test\Watson\Mock\WatsonApi as MockWatsonApi;
use PHPUnit\Framework\TestCase;

class WatsonApiTest extends TestCase
{
    const API_KEY = 'xyz-abc';
    const VERSION = '123987';

    public function testApiKeyAndVersionAreSet()
    {

        $api = new MockWatsonApi(self::API_KEY, self::VERSION);

        $this->assertEquals(self::API_KEY, $api->getApiKey(), 'API key does not match');
        $this->assertEquals(self::VERSION, $api->getVersion(), 'API version does not match');
    }


    public function testDefaultHttpClient()
    {
        $api = new MockWatsonApi(self::API_KEY, self::VERSION);

        $this->assertNotNull($api->getHttpClient(), 'Default Http Client is null');
    }


    public function testCustomHttpClient()
    {
        $client = new MockHttpClient();

        $api = new MockWatsonApi(self::API_KEY, self::VERSION);
        $api->setHttpClient($client);

        $this->assertInstanceOf(MockHttpClient::class, $api->getHttpClient(), 'Http Client type does not match');
    }


}


