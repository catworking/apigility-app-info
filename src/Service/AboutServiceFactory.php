<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/12/19
 * Time: 15:07:01
 */
namespace ApigilityAppInfo\Service;

use Zend\ServiceManager\ServiceManager;

class AboutServiceFactory
{
    public function __invoke(ServiceManager $services)
    {
        return new AboutService($services);
    }
}