<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/12/19
 * Time: 15:06:44
 */
namespace ApigilityAppInfo\Service;

use Zend\ServiceManager\ServiceManager;

class ProtocolServiceFactory
{
    public function __invoke(ServiceManager $services)
    {
        return new ProtocolService($services);
    }
}