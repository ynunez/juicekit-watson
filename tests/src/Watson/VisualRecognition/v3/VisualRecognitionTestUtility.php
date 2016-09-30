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
use JuiceKit\Test\Watson\Mock\HttpClient as MockHttpClient;
use JuiceKit\Watson\VisualRecognition\v3\VisualRecognition;

trait VisualRecognitionTestUtility
{
    /** @var  MockHttpClient */
    private $client;

    /** @var  VisualRecognition */
    private $api;

    protected function setUp()
    {
        $this->client = new MockHttpClient();

        $this->api = new VisualRecognition('xyz-abc', '123987');
        $this->api->setHttpClient($this->client);
    }

    public function responseGetClassifier($classifierId = 'string')
    {
        return new Response(200, [], json_encode([
            'classifier_id' => $classifierId,
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

    private function responseFaceRecognitionWithUrl()
    {
        $response = json_encode([
            "images" => [
                [
                    "faces" => [
                        [
                            "age" => [
                                "max" => 64,
                                "min" => 55,
                                "score" => 0.447907
                            ],
                            "face_location" => [
                                "height" => 681,
                                "left" => 399,
                                "top" => 387,
                                "width" => 656
                            ],
                            "gender" => [
                                "gender" => "MALE",
                                "score" => 0.622459
                            ],
                            "identity" => [
                                "name" => "John Doe",
                                "score" => 0.622459,
                                "type_hierarchy" => "/people/john doe"
                            ]
                        ]
                    ],
                    "resolved_url" => "https://yourhost.com/path/to/image.jpg",
                    "source_url" => "https://yourhost.com/path/to/image.jpg"
                ]
            ],
            "images_processed" => 1
        ]);

        return new Response(200, [], $response);
    }

    private function responseFaceRecognitionWithFile()
    {
        $response = json_encode([
            "images" => [
                [
                    "faces" => [
                        [
                            "age" => [
                                "max" => 64,
                                "min" => 55,
                                "score" => 0.447907
                            ],
                            "face_location" => [
                                "height" => 681,
                                "left" => 399,
                                "top" => 387,
                                "width" => 656
                            ],
                            "gender" => [
                                "gender" => "MALE",
                                "score" => 0.622459
                            ],
                            "identity" => [
                                "name" => "John Doe",
                                "score" => 0.622459,
                                "type_hierarchy" => "/people/john doe"
                            ]
                        ]
                    ],
                    "image" => "image-file.jpg",
                ]
            ],
            "images_processed" => 1
        ]);

        return new Response(200, [], $response);
    }

    private function responseRecognizeTextWithUrl()
    {
        $response = json_encode([
            "images" => [
                [
                    "resolved_url" => "https://yourhost.com/path/to/image.jpg",
                    "source_url" => "https://yourhost.com/path/to/image.jpg",
                    "text" => "lormem ipsum",
                    "words" => [
                        [
                            "line_number" => 0,
                            "location" => [
                                "height" => 195,
                                "left" => 98,
                                "top" => 325,
                                "width" => 487
                            ],
                            "score" => 0.998773,
                            "word" => "lorem"
                        ],
                        [
                            "line_number" => 0,
                            "location" => [
                                "height" => 162,
                                "left" => 617,
                                "top" => 358,
                                "width" => 357
                            ],
                            "score" => 0.992393,
                            "word" => "ipsum"
                        ]
                    ]
                ]
            ],
            "images_processed" => 1
        ]);

        return new Response(200, [], $response);
    }

    private function responseRecognizeTextWithFile()
    {
        $response = json_encode([
            "images" => [
                [
                    "text" => "lormem ipsum",
                    "words" => [
                        [
                            "line_number" => 0,
                            "location" => [
                                "height" => 195,
                                "left" => 98,
                                "top" => 325,
                                "width" => 487
                            ],
                            "score" => 0.998773,
                            "word" => "lorem"
                        ],
                        [
                            "line_number" => 0,
                            "location" => [
                                "height" => 162,
                                "left" => 617,
                                "top" => 358,
                                "width" => 357
                            ],
                            "score" => 0.992393,
                            "word" => "ipsum"
                        ]
                    ]
                ]
            ],
            "images_processed" => 1
        ]);

        return new Response(200, [], $response);
    }

    private function emptyResponse()
    {
        return new Response(200, [], json_encode([]));
    }
}