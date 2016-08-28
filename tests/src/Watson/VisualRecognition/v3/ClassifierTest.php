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

namespace JuiceKit\Watson\VisualRecognition\v3;

use GuzzleHttp\Psr7;
use JuiceKit\Test\Watson\VisualRecognition\v3\VisualRecognitionTestUtility;
use PHPUnit\Framework\TestCase;

class ClassifierTest extends TestCase
{
    use VisualRecognitionTestUtility;

    public function testClassifyByUrl()
    {
        $mockResponse = $this->responseGetClassifier();
        $this->client->pushResponse($mockResponse);

        $imageUrl = 'http://my-domain.com/path/to/image.jpg';

        $this->api->classify($imageUrl);

        $request = $this->client->getRequest();

        $this->assertEquals('GET', $request['type']);
        $this->assertArrayHasKey('url', $request['options']['query']);
        $this->assertEquals($imageUrl, $request['options']['query']['url']);
    }


    public function testClassifyFile()
    {
        $mockResponse = $this->responseGetClassifier();
        $this->client->pushResponse($mockResponse);

        $mockImageFileResource = 'image resource fopen($FILE_NAME, MODE)';

        $stream = Psr7\stream_for($mockImageFileResource);

        $this->api->classify($stream);

        $request = $this->client->getRequest();

        $this->assertEquals('POST', $request['type']);
        $this->assertArrayHasKey('body', $request['options']);
    }


    public function testGetClassifier()
    {
        $mockResponse = $this->responseGetClassifier();
        $this->client->pushResponse($mockResponse);

        $response = $this->api->getClassifier('the_classifier_id');

        $request = $this->client->getRequest();

        $this->assertArrayHasKey('classifier_id', $response);
        $this->assertArrayHasKey('name', $response);
        $this->assertArrayHasKey('owner', $response);
        $this->assertArrayHasKey('status', $response);
        $this->assertArrayHasKey('created', $response);
        $this->assertArrayHasKey('classes', $response);


        $this->assertInternalType('array', $response['classes']);
        $this->assertEquals('GET', $request['type']);
    }

    public function testListClassifiers()
    {
        $mockResponse = $this->responseListClassifiers();
        $this->client->pushResponse($mockResponse);

        $classifiers = $this->api->listClassifiers();

        $request = $this->client->getRequest();

        $this->assertCount(1, $classifiers);

        $classifier = $classifiers[0];

        $this->assertArrayHasKey('classifier_id', $classifier);
        $this->assertArrayHasKey('name', $classifier);
        $this->assertArrayHasKey('owner', $classifier);
        $this->assertArrayHasKey('status', $classifier);
        $this->assertArrayHasKey('created', $classifier);
        $this->assertArrayHasKey('classes', $classifier);

        $this->assertInternalType('array', $classifier['classes']);
        $this->assertEquals('GET', $request['type']);
    }
}
