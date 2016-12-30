<?php
namespace ApigilityAppInfo\V1\Rpc\ProtocolPage;

use ApigilityAppInfo\V1\Rest\Protocol\ProtocolEntity;
use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;

class ProtocolPageController extends AbstractActionController
{
    /**
     * @var \Zend\ServiceManager\ServiceManager
     */
    protected $serviceManager;

    /**
     * @var \ApigilityAppInfo\Service\ProtocolService
     */
    protected $protocolService;

    function __construct($services)
    {
        $this->serviceManager = $services;
        $this->protocolService = $this->serviceManager->get('ApigilityAppInfo\Service\ProtocolService');
    }

    public function protocolPageAction()
    {
        $protocol_id = $this->getEvent()->getRouteMatch()->getParam('protocol_id');
        if (empty($protocol_id)) $protocol_id = 1;

        $vm = new ViewModel([
            'payload' => new ProtocolEntity($this->protocolService->getProtocol($protocol_id))
        ]);
        $vm->setTerminal(true);
        $vm->setTemplate('protocol-page.phtml');

        return $vm;
    }
}
