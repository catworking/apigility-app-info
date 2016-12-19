<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/11/30
 * Time: 16:32
 */
return [
    'zf-content-negotiation' => [
        'selectors'   => [
            'HTML-or-Json' => [
                'ZF\Hal\View\HalJsonModel' => [
                    'application/json',
                    'application/*+json',
                ],
                'ZF\ContentNegotiation\ViewModel' => [
                    'text/html',
                ],
            ],
        ],
    ]
];