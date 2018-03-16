<?php

namespace Application\Controller;

use Zend\View\Model\JsonModel;

class APIController extends Controller
{

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
