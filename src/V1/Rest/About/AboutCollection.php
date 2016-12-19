<?php
namespace ApigilityAppInfo\V1\Rest\About;

use ApigilityCatworkFoundation\Base\ApigilityObjectStorageAwareCollection;

class AboutCollection extends ApigilityObjectStorageAwareCollection
{
    protected $itemType = AboutEntity::class;
}
