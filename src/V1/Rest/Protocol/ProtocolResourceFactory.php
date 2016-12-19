<?php
namespace ApigilityAppInfo\V1\Rest\Protocol;

class ProtocolResourceFactory
{
    public function __invoke($services)
    {
        return new ProtocolResource($services);
    }
}
