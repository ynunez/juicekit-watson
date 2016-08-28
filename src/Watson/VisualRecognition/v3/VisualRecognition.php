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


use JuiceKit\Watson\VisualRecognition\ImageApiResource;
use JuiceKit\Watson\WatsonApi;

class VisualRecognition extends WatsonApi
{
    use ImageApiResource;

    public function classify($data)
    {
        if ($this->isResourceStream($data)) {
            $response = $this->post('/visual-recognition/api/v3/classify', [
                'body' => $data
            ]);
        } else {
            $response = $this->get('/visual-recognition/api/v3/classify', [
                'query' => [
                    'url' => $data
                ]
            ]);
        }

        return $response;
    }

    public function detectFaces($data)
    {

        if ($this->isResourceStream($data)) {
            $response = $this->post('/visual-recognition/api/v3/detect_faces', [
                'body' => $data
            ]);
        } else {
            $response = $this->get('/visual-recognition/api/v3/detect_faces', [
                'query' => [
                    'url' => $data
                ]
            ]);
        }

        return $response;
    }

    public function recognizeText($data)
    {
        if ($this->isResourceStream($data)) {
            $response = $this->post('/visual-recognition/api/v3/recognize_text', [
                'body' => $data
            ]);
        } else {
            $response = $this->get('/visual-recognition/api/v3/recognize_text', [
                'query' => [
                    'url' => $data
                ]
            ]);
        }

        return $response;
    }

    public function createClassifier()
    {
        throw new \Exception('Unimplemented method');

    }

    public function retrainClassifier()
    {
        throw new \Exception('Unimplemented method');
    }

    public function listClassifiers()
    {
        $response = $this->get('/visual-recognition/api/v3/classifiers');

        return $response['classifiers'];
    }

    public function listCollections()
    {
        $response = $this->get('/visual-recognition/api/v3/collections');

        return $response['collections'];
    }

    public function getClassifier($classifier_id)
    {
        return $this->get('/visual-recognition/api/v3/classifiers/' . $classifier_id);
    }

    public function getCollection($collection_id)
    {
        return $this->get('/visual-recognition/api/v3/collections/' . $collection_id);
    }

    public function listCollectionImages($collection_id)
    {
        return $this->get('/visual-recognition/api/v3/collections/' . $collection_id . '/images');
    }

    public function deleteClassifier()
    {
        throw new \Exception('Unimplemented method');
    }

    public function getCollectionImageDetails($collection_id, $image_id)
    {
        return $this->get('/visual-recognition/api/v3/collections/' . $collection_id . '/images/' . $image_id);
    }

    public function getCollectionImageMetadata($collection_id, $image_id)
    {
        return $this->get('/visual-recognition/api/v3/collections/' . $collection_id . '/images/' . $image_id . '/metadata');
    }
}