<?php

namespace Application\Controller;

use Application\Model\ChaleTable;
use Zend\View\Model\JsonModel;

class ChaleController extends Controller
{
    protected $table;

    public function __construct(ChaleTable $table)
    {
        $this->table = $table;
    }
    
    public function getList()
    {
        $this->getResponse()->setStatusCode(200);
        return new JsonModel([
            $this->table->getAll()
        ]);
    }

    public function get($id)
    {
        return $this->methodNotAllowed();
    }

    public function create($data)
    {
        return $this->methodNotAllowed();
    }

    public function update($id, $data)
    {
        return $this->methodNotAllowed();
    }

    public function delete($id)
    {
        return $this->methodNotAllowed();
    }
}