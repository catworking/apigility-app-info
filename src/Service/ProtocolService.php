<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/12/19
 * Time: 15:06:28
 */
namespace ApigilityAppInfo\Service;

use Zend\ServiceManager\ServiceManager;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator as DoctrineToolPaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrinePaginatorAdapter;
use ApigilityAppInfo\DoctrineEntity;

class ProtocolService
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

    public function createProtocol($data)
    {
        $protocol = new DoctrineEntity\Protocol();

        if (isset($data->title)) $protocol->setTitle($data->title);
        if (isset($data->content)) $protocol->setContent($data->content);
        $protocol->setUpdateTime(new \DateTime());

        $this->em->persist($protocol);
        $this->em->flush();

        return $protocol;
    }

    public function updateProtocol($protocol_id, $data)
    {
        $protocol = $this->getProtocol($protocol_id);
        $this->classMethodsHydrator->hydrate(
            $this->classMethodsHydrator->extract($data),
            $protocol);

        $protocol->setUpdateTime(new \DateTime());

        $this->em->flush();

        return $protocol;
    }

    public function getProtocol($protocol_id)
    {
        $protocol = $this->em->find('ApigilityAppInfo\DoctrineEntity\Protocol', $protocol_id);
        if (empty($protocol)) throw new \Exception('协议不存在', 404);
        else return $protocol;
    }

    public function getProtocols($params)
    {
        $qb = new QueryBuilder($this->em);
        $qb->select('p')->from('ApigilityAppInfo\DoctrineEntity\Protocol', 'p');

        $doctrine_paginator = new DoctrineToolPaginator($qb->getQuery());
        return new DoctrinePaginatorAdapter($doctrine_paginator);
    }
}