<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/12/19
 * Time: 15:07:11
 */
namespace ApigilityAppInfo\Service;

use Zend\ServiceManager\ServiceManager;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator as DoctrineToolPaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrinePaginatorAdapter;
use ApigilityAppInfo\DoctrineEntity;

class AboutService
{
    protected $classMethodsHydrator;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    public function __construct(ServiceManager $services)
    {
        $this->classMethodsHydrator = new ClassMethodsHydrator();
        $this->em = $services->get('Doctrine\ORM\EntityManager');
    }

    public function createAbout($data)
    {
        $about = new DoctrineEntity\About();

        if (isset($data->app_name)) $about->setAppName($data->app_name);
        if (isset($data->logo)) $about->setLogo($data->logo);
        if (isset($data->content)) $about->setContent($data->content);

        if (isset($data->customer_service_tel)) $about->setCustomerServiceTel($data->customer_service_tel);
        if (isset($data->feedback_email)) $about->setFeedbackEmail($data->feedback_email);
        if (isset($data->enterprise_name)) $about->setEnterpriseName($data->enterprise_name);
        if (isset($data->enterprise_address)) $about->setEnterpriseAddress($data->enterprise_address);

        $about->setUpdateTime(new \DateTime());

        $this->em->persist($about);
        $this->em->flush();

        return $about;
    }

    public function updateAbout($about_id, $data)
    {
        $about = $this->getAbout($about_id);

        if (isset($data->app_name)) $about->setAppName($data->app_name);
        if (isset($data->logo)) $about->setLogo($data->logo);
        if (isset($data->content)) $about->setContent($data->content);

        if (isset($data->customer_service_tel)) $about->setCustomerServiceTel($data->customer_service_tel);
        if (isset($data->feedback_email)) $about->setFeedbackEmail($data->feedback_email);
        if (isset($data->enterprise_name)) $about->setEnterpriseName($data->enterprise_name);
        if (isset($data->enterprise_address)) $about->setEnterpriseAddress($data->enterprise_address);

        $about->setUpdateTime(new \DateTime());

        $this->em->flush();

        return $about;
    }

    public function getAbout($about_id)
    {
        $about = $this->em->find('ApigilityAppInfo\DoctrineEntity\About', $about_id);
        if (empty($about)) throw new \Exception('关于信息不存在', 404);
        else return $about;
    }

    public function getAbouts($params)
    {
        $qb = new QueryBuilder($this->em);
        $qb->select('a')->from('ApigilityAppInfo\DoctrineEntity\About', 'a');

        $doctrine_paginator = new DoctrineToolPaginator($qb->getQuery());
        return new DoctrinePaginatorAdapter($doctrine_paginator);
    }
}