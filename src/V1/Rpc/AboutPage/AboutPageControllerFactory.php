<?php
namespace ApigilityAppInfo\V1\Rpc\AboutPage;

class AboutPageControllerFactory
{
    public function __invoke($services)
    {
        return new AboutPageController($services);
    }
}
