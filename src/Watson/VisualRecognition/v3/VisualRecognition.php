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
            return $this->post('/visual-recognition/api/v3/classify', [
                'body' => $data
            ]);
        }

        return $this->get('/visual-recognition/api/v3/classify', [
            'query' => [
                'url' => $data
            ]
        ]);
    }

    public function detectFaces($data)
    {

        if ($this->isResourceStream($data)) {
            return $this->post('/visual-recognition/api/v3/detect_faces', [
                'body' => $data
            ]);
        }
        return $this->get('/visual-recognition/api/v3/detect_faces', [
            'query' => [
                'url' => $data
            ]
        ]);
    }

    public function recognizeText($data)
    {
        if ($this->isResourceStream($data)) {
            return $this->post('/visual-recognition/api/v3/recognize_text', [
                'body' => $data
            ]);
        }
        return $this->get('/visual-recognition/api/v3/recognize_text', [
            'query' => [
                'url' => $data
            ]
        ]);
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

    public function getClassifier($classifierId)
    {
        return $this->get('/visual-recognition/api/v3/classifiers/' . $classifierId);
    }

    public function getCollection($collectionId)
    {
        return $this->get('/visual-recognition/api/v3/collections/' . $collectionId);
    }

    public function listCollectionImages($collectionId)
    {
        return $this->get('/visual-recognition/api/v3/collections/' . $collectionId . '/images');
    }

    public function deleteClassifier()
    {
        throw new \Exception('Unimplemented method');
    }

    public function getCollectionImageDetails($collectionId, $imageId)
    {
        return $this->get('/visual-recognition/api/v3/collections/' . $collectionId . '/images/' . $imageId);
    }

    public function getCollectionImageMetadata($collectionId, $imageId)
    {
        return $this->get('/visual-recognition/api/v3/collections/' . $collectionId . '/images/' . $imageId . '/metadata');
    }
}
