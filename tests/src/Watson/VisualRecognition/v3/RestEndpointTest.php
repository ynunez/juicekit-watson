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

use JuiceKit\Test\Watson\VisualRecognition\v3\VisualRecognitionTestUtility;
use PHPUnit\Framework\TestCase;

class RestEndpointTest extends TestCase
{
    use VisualRecognitionTestUtility;

    public function testClassifyEndpoint()
    {
        $this->client->pushResponse($this->responseGetClassifier());

        $this->api->classify('http://my-domain.com/path/to/image.jpg');

        $request = $this->client->getRequest();

        $this->assertStringEndsWith('/v3/classify', $request['uri']);
    }

    public function testDetectFacesEndpoint()
    {
        $this->client->pushResponse($this->responseGetClassifier());

        $this->api->detectFaces('image_url');

        $request = $this->client->getRequest();

        $this->assertStringEndsWith('/v3/detect_faces', $request['uri']);
    }

    public function testClassifiersEndpoint()
    {
        $this->client->pushResponse($this->responseListClassifiers());

        $this->api->listClassifiers();

        $request = $this->client->getRequest();

        $this->assertStringEndsWith('/v3/classifiers', $request['uri']);
    }

    public function testGetClassifierEndpoint()
    {
        $this->client->pushResponse($this->responseGetClassifier());

        $this->api->getClassifier('{classifier_id}');

        $request = $this->client->getRequest();

        $this->assertStringEndsWith('/v3/classifiers/{classifier_id}', $request['uri']);
    }


    public function testListCollectionsEndpoint()
    {
        $this->client->pushResponse($this->responseListCollections());

        $this->api->listCollections();

        $request = $this->client->getRequest();

        $this->assertStringEndsWith('/v3/collections', $request['uri']);
    }


    public function testGetCollectionEndpoint()
    {
        $this->client->pushResponse($this->responseGetCollection());

        $this->api->getCollection('{collection_id}');

        $request = $this->client->getRequest();

        $this->assertStringEndsWith('/v3/collections/{collection_id}', $request['uri']);
    }

    public function testListCollectionImagesEndpoint()
    {
        $this->client->pushResponse($this->responseGetCollection());

        $this->api->listCollectionImages('{collection_id}');

        $request = $this->client->getRequest();

        $this->assertStringEndsWith('/v3/collections/{collection_id}/images', $request['uri']);
    }

    public function testGetCollectionImageDetailsEndpoint()
    {
        $this->client->pushResponse($this->responseGetCollection());

        $this->api->getCollectionImageDetails('{collection_id}', '{image_id}');

        $request = $this->client->getRequest();

        $this->assertStringEndsWith('/v3/collections/{collection_id}/images/{image_id}', $request['uri']);
    }

    public function testGetCollectionImageMetadataEndpoint()
    {
        $this->client->pushResponse($this->responseGetCollection());

        $this->api->getCollectionImageMetadata('{collection_id}', '{image_id}');

        $request = $this->client->getRequest();

        $this->assertStringEndsWith('/v3/collections/{collection_id}/images/{image_id}/metadata', $request['uri']);
    }


    public function testRecognizeTextEndpoint()
    {
        $this->client->pushResponse($this->emptyResponse());

        $this->api->recognizeText('image_with_text');

        $request = $this->client->getRequest();

        $this->assertStringEndsWith('/v3/recognize_text', $request['uri']);
    }
}