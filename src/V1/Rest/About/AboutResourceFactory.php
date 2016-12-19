<?php
namespace ApigilityAppInfo\V1\Rest\About;

class AboutResourceFactory
{
    public function __invoke($services)
    {
        return new AboutResource();
    }
}
