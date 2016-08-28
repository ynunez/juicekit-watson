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

namespace JuiceKit\Test\Watson\VisualRecognition\v3;


use GuzzleHttp\Psr7\Response;
use JuiceKit\Test\Watson\MockHttpClient;
use JuiceKit\Watson\VisualRecognition\v3\VisualRecognition;

trait VisualRecognitionTestUtility
{
    private static $API_KEY = 'xyz-abc';
    private static $VERSION = '123987';

    /** @var  MockHttpClient */
    private $client;

    /** @var  VisualRecognition */
    private $api;

    protected function setUp()
    {
        $this->client = new MockHttpClient();

        $this->api = new VisualRecognition(self::$API_KEY, self::$VERSION);
        $this->api->setHttpClient($this->client);
    }

    public function responseGetClassifier($id = 'string')
    {
        return new Response(200, [], json_encode([
            'classifier_id' => $id,
            'name' => 'string',
            'owner' => 'string',
            'status' => 'string',
            'explanation' => 'string',
            'created' => 'string',
            'classes' => [
                [
                    'class' => 'string'
                ]
            ]
        ]));
    }

    private function responseListClassifiers()
    {
        $response = json_encode([
            'classifiers' => [
                [
                    'classifier_id' => 'string',
                    'name' => 'string',
                    'owner' => 'string',
                    'status' => 'string',
                    'explanation' => 'string',
                    'created' => 'string',
                    'classes' => [
                        [
                            'class' => 'string'
                        ]
                    ]
                ]
            ]
        ]);

        return new Response(200, [], $response);
    }

    private function responseListCollections()
    {
        $response = json_encode([
            'collections' => [
                'collection_id' => 'string',
                'name' => 'string',
                'created' => 'string',
                'images' => 0,
                'status' => 'string',
                'capacity' => 'string',
            ]
        ]);

        return new Response(200, [], $response);
    }

    private function responseGetCollection()
    {
        $response = json_encode([
            'collection_id' => 'string',
            'name' => 'string',
            'created' => 'string',
            'images' => 0,
            'status' => 'string',
            'capacity' => 'string',
        ]);

        return new Response(200, [], $response);
    }

    private function emptyResponse()
    {
        return new Response(200, [], json_encode([]));
    }
}