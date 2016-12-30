<?php
namespace ApigilityAppInfo\V1\Rpc\ProtocolPage;

class ProtocolPageControllerFactory
{
    public function __invoke($services)
    {
        return new ProtocolPageController($services);
    }
}
