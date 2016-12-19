<?php
return [
    'service_manager' => [
        'factories' => [
            \ApigilityAppInfo\V1\Rest\About\AboutResource::class => \ApigilityAppInfo\V1\Rest\About\AboutResourceFactory::class,
            \ApigilityAppInfo\V1\Rest\Protocol\ProtocolResource::class => \ApigilityAppInfo\V1\Rest\Protocol\ProtocolResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'apigility-app-info.rest.about' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/appinfo/about[/:about_id]',
                    'defaults' => [
                        'controller' => 'ApigilityAppInfo\\V1\\Rest\\About\\Controller',
                    ],
                ],
            ],
            'apigility-app-info.rest.protocol' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/appinfo/protocol[/:protocol_id]',
                    'defaults' => [
                        'controller' => 'ApigilityAppInfo\\V1\\Rest\\Protocol\\Controller',
                    ],
                ],
            ],
            'apigility-app-info.rpc.about-page' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/appinfo/about/page',
                    'defaults' => [
                        'controller' => 'ApigilityAppInfo\\V1\\Rpc\\AboutPage\\Controller',
                        'action' => 'aboutPage',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'apigility-app-info.rest.about',
            1 => 'apigility-app-info.rest.protocol',
            2 => 'apigility-app-info.rpc.about-page',
        ],
    ],
    'zf-rest' => [
        'ApigilityAppInfo\\V1\\Rest\\About\\Controller' => [
            'listener' => \ApigilityAppInfo\V1\Rest\About\AboutResource::class,
            'route_name' => 'apigility-app-info.rest.about',
            'route_identifier_name' => 'about_id',
            'collection_name' => 'about',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \ApigilityAppInfo\V1\Rest\About\AboutEntity::class,
            'collection_class' => \ApigilityAppInfo\V1\Rest\About\AboutCollection::class,
            'service_name' => 'About',
        ],
        'ApigilityAppInfo\\V1\\Rest\\Protocol\\Controller' => [
            'listener' => \ApigilityAppInfo\V1\Rest\Protocol\ProtocolResource::class,
            'route_name' => 'apigility-app-info.rest.protocol',
            'route_identifier_name' => 'protocol_id',
            'collection_name' => 'protocol',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \ApigilityAppInfo\V1\Rest\Protocol\ProtocolEntity::class,
            'collection_class' => \ApigilityAppInfo\V1\Rest\Protocol\ProtocolCollection::class,
            'service_name' => 'Protocol',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'ApigilityAppInfo\\V1\\Rest\\About\\Controller' => 'HalJson',
            'ApigilityAppInfo\\V1\\Rest\\Protocol\\Controller' => 'HalJson',
            'ApigilityAppInfo\\V1\\Rpc\\AboutPage\\Controller' => 'HTML-or-Json',
        ],
        'accept_whitelist' => [
            'ApigilityAppInfo\\V1\\Rest\\About\\Controller' => [
                0 => 'application/vnd.apigility-app-info.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'ApigilityAppInfo\\V1\\Rest\\Protocol\\Controller' => [
                0 => 'application/vnd.apigility-app-info.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'ApigilityAppInfo\\V1\\Rpc\\AboutPage\\Controller' => [
                0 => 'application/vnd.apigility-app-info.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
                3 => 'text/html',
            ],
        ],
        'content_type_whitelist' => [
            'ApigilityAppInfo\\V1\\Rest\\About\\Controller' => [
                0 => 'application/vnd.apigility-app-info.v1+json',
                1 => 'application/json',
            ],
            'ApigilityAppInfo\\V1\\Rest\\Protocol\\Controller' => [
                0 => 'application/vnd.apigility-app-info.v1+json',
                1 => 'application/json',
            ],
            'ApigilityAppInfo\\V1\\Rpc\\AboutPage\\Controller' => [
                0 => 'application/vnd.apigility-app-info.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \ApigilityAppInfo\V1\Rest\About\AboutEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-app-info.rest.about',
                'route_identifier_name' => 'about_id',
                'hydrator' => \Zend\Hydrator\ClassMethods::class,
            ],
            \ApigilityAppInfo\V1\Rest\About\AboutCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-app-info.rest.about',
                'route_identifier_name' => 'about_id',
                'is_collection' => true,
            ],
            \ApigilityAppInfo\V1\Rest\Protocol\ProtocolEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-app-info.rest.protocol',
                'route_identifier_name' => 'protocol_id',
                'hydrator' => \Zend\Hydrator\ClassMethods::class,
            ],
            \ApigilityAppInfo\V1\Rest\Protocol\ProtocolCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-app-info.rest.protocol',
                'route_identifier_name' => 'protocol_id',
                'is_collection' => true,
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            'ApigilityAppInfo\\V1\\Rpc\\AboutPage\\Controller' => \ApigilityAppInfo\V1\Rpc\AboutPage\AboutPageControllerFactory::class,
        ],
    ],
    'zf-rpc' => [
        'ApigilityAppInfo\\V1\\Rpc\\AboutPage\\Controller' => [
            'service_name' => 'AboutPage',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'apigility-app-info.rpc.about-page',
        ],
    ],
];
