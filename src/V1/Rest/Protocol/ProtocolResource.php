<?php
namespace ApigilityAppInfo\V1\Rest\Protocol;

use ApigilityCatworkFoundation\Base\ApigilityResource;
use Zend\ServiceManager\ServiceManager;
use ZF\ApiProblem\ApiProblem;

class ProtocolResource extends ApigilityResource
{
    /**
     * @var \ApigilityAppInfo\Service\ProtocolService
     */
    protected $protocolService;

    public function __construct(ServiceManager $services)
    {
        parent::__construct($services);

        $this->protocolService = $this->serviceManager->get('ApigilityAppInfo\Service\ProtocolService');
    }

    public function create($data)
    {
        try {
            return new ProtocolEntity($this->protocolService->createProtocol($data));
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }

    public function fetch($id)
    {
        try {
            return new ProtocolEntity($this->protocolService->getProtocol($id));
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }

    public function fetchAll($params = [])
    {
        try {
            return new ProtocolCollection($this->protocolService->getProtocols($params));
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }

    public function patch($id, $data)
    {
        try {
            return new ProtocolEntity($this->protocolService->updateProtocol($id, $data));
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }
}
