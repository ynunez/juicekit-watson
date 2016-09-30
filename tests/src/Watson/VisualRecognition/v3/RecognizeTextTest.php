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

class RecognizeTextTest extends TestCase
{
    use VisualRecognitionTestUtility;

    public function testRecognizeTextWithUrl()
    {
        $mockResponse = $this->responseRecognizeTextWithUrl();
        $this->client->pushResponse($mockResponse);

        $imageUrl = 'http://my-domain.com/path/to/image.jpg';

        $this->api->recognizeText($imageUrl);

        $request = $this->client->getRequest();

        $this->assertEquals('GET', $request['type']);
        $this->assertArrayHasKey('url', $request['options']['query']);
        $this->assertEquals($imageUrl, $request['options']['query']['url']);
    }


    public function testRecognizeTextWithFile()
    {
        $mockResponse = $this->responseRecognizeTextWithFile();
        $this->client->pushResponse($mockResponse);

        $mockImageFileResource = 'image resource fopen($FILE_NAME, MODE)';

        $stream = Psr7\stream_for($mockImageFileResource);

        $this->api->recognizeText($stream);

        $request = $this->client->getRequest();

        $this->assertEquals('POST', $request['type']);
        $this->assertArrayHasKey('body', $request['options']);
    }
}
