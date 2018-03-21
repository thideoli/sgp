<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class Controller extends AbstractRestfulController
{
    protected function methodNotAllowed()
    {
        return $this->jsonResponse(null, 405);
    }

    protected function jsonResponse($data = null, $statusCode = 200)
    {
        $this->getResponse()->setStatusCode($statusCode);
        return new JsonModel([
            'data' => $data,
        ]);
    }
}