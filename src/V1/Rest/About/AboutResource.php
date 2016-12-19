<?php
namespace ApigilityAppInfo\V1\Rest\About;

use ApigilityCatworkFoundation\Base\ApigilityResource;
use Zend\ServiceManager\ServiceManager;
use ZF\ApiProblem\ApiProblem;

class AboutResource extends ApigilityResource
{
    /**
     * @var \ApigilityAppInfo\Service\AboutService
     */
    protected $aboutService;

    public function __construct(ServiceManager $services)
    {
        parent::__construct($services);

        $this->aboutService = $this->serviceManager->get('ApigilityAppInfo\Service\AboutService');
    }

    public function create($data)
    {
        try {
            return new AboutEntity($this->aboutService->createAbout($data), $this->serviceManager);
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }

    public function fetch($id)
    {
        try {
            return new AboutEntity($this->aboutService->getAbout($id), $this->serviceManager);
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }

    public function fetchAll($params = [])
    {
        try {
            return new AboutCollection($this->aboutService->getAbouts($params), $this->serviceManager);
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }

    public function patch($id, $data)
    {
        try {
            return new AboutEntity($this->aboutService->updateAbout($id, $data), $this->serviceManager);
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }
}
