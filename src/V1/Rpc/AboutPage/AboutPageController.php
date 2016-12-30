<?php
namespace ApigilityAppInfo\V1\Rpc\AboutPage;

use ApigilityAppInfo\V1\Rest\About\AboutEntity;
use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;

class AboutPageController extends AbstractActionController
{
    /**
     * @var \Zend\ServiceManager\ServiceManager
     */
    protected $serviceManager;

    /**
     * @var \ApigilityAppInfo\Service\AboutService
     */
    protected $aboutService;

    function __construct($services)
    {
        $this->serviceManager = $services;
        $this->aboutService = $this->serviceManager->get('ApigilityAppInfo\Service\AboutService');
    }

    public function aboutPageAction()
    {
        $about_id = $this->getEvent()->getRouteMatch()->getParam('about_id');
        if (empty($about_id)) $about_id = 1;

        $vm = new ViewModel([
            'payload' => new AboutEntity($this->aboutService->getAbout($about_id), $this->serviceManager)
        ]);
        $vm->setTerminal(true);
        $vm->setTemplate('about-page.phtml');

        return $vm;
    }
}
