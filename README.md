## JuiceKit Watson

[![Build Status](https://travis-ci.org/juicekit/juicekit-watson.svg?branch=master)](https://travis-ci.org/juicekit/juicekit-watson)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/b4d72ef87ba943f7a1426247e58a68a8)](https://www.codacy.com/app/yoel/juicekit-watson?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=juicekit/juicekit-watson&amp;utm_campaign=Badge_Grade)
[![Codacy Badge](https://api.codacy.com/project/badge/Coverage/b4d72ef87ba943f7a1426247e58a68a8)](https://www.codacy.com/app/yoel/juicekit-watson?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=juicekit/juicekit-watson&amp;utm_campaign=Badge_Coverage)

JuiceKit Watson is a PHP implementation of IBM's Watson REST API.

> **Note:** Currently, only the VisualRecognition API is supported, other APIs will be supported in the future. For more information on available Watson APIs visit http://www.ibm.com/watson/developercloud/

## Installation

`composer require juicekit/watson`

### Example Usage

Classify an image from a url or file

```
<?php
require_once '../vendor/autoload.php';

use JuiceKit\Watson as Watson;

$visualRecognition = new Watson\VisualRecognition\v3\VisualRecognition('YOUR_API_KEY', 'YOUR_VERSION');

/**
 * $responseWithImageUrl = [
 *      'custom_classes'=> 0,
 *      'images'=> [
 *          [
 *              'classifiers'=> [
 *                  'classes'=> [
 *                      [
 *                          'class'=> 'person',
 *                          'score'=> '0.999999',
 *                          'type_hierarchy'=> '/people'
 *                      ]
 *                  ],
 *                  'classifier_id'=> 'default',
 *                  'name'=> 'default'
 *              ]
 *          ]
 *      ],
 *      'images_processed'=> 1
 * ]
 */
$responseWithImageUrl = $visualRecognition->classify('http://your-image-resource.com/image.jpg');

$imageResource = fopen('your-image.jpg', 'r');

/**
 * $responseWithImageFile = [
 *      'custom_classes'=> 0,
 *      'images'=> [
 *          [
 *              'classifiers'=> [
 *                  'classes'=> [
 *                      [
 *                          'class'=> 'person',
 *                          'score'=> '0.999999',
 *                          'type_hierarchy'=> '/people'
 *                      ]
 *                  ],
 *                  'classifier_id'=> 'default',
 *                  'name'=> 'default'
 *              ]
 *          ]
 *      ],
 *      'images_processed'=> 1
 * ]
 */
$responseWithImageFile = $visualRecognition->classify($imageResource);
```
