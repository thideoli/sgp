<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class APIController extends AbstractRestfulController
{

    protected function methodNotAllowed()
    {
        $this->getResponse()->setStatusCode(405);
        return new JsonModel([
            'code' => $this->getResponse()->getStatusCode(),
            'status' => $this->getResponse()->getReasonPhrase()
        ]);
    }

    public function statusAction()
    {
        if ($this->getRequest()->isGet()) {
            return new JsonModel([
                'code' => $this->getResponse()->getStatusCode(),
                'status' => $this->getResponse()->getReasonPhrase()
            ]);
        } else {
            return $this->methodNotAllowed();
        }
    }

}
