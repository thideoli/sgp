<?php

namespace Application\Controller;

use Application\Model\Chale;
use Application\Model\ChaleTable;

class ChaleController extends Controller
{
    private $table;

    public function __construct(ChaleTable $table)
    {
        $this->table = $table;
    }
    
    public function getList()
    {
        return $this->jsonResponse($this->table->get());
    }

    public function get($id)
    {
        $data = $this->table->get($id);

        if(!$data)
            return $this->jsonResponse(null, 404);

        return $this->jsonResponse($data);
    }

    public function create($data)
    {
        $chale = new Chale();
        $chale->exchangeArray($data);
        $chale->id = $this->table->save($chale);

        if($chale->id > 0)
            return $this->jsonResponse($chale->getArrayCopy(), 201);

        return $this->jsonResponse(null, 500);
    }

    public function update($id, $data)
    {
        if(!$this->table->get($id))
            return $this->jsonResponse(null, 404);

        $chale = new Chale();
        $chale->exchangeArray($data);

        if($this->table->save($chale) > 0)
            return $this->jsonResponse(null, 204);

        return $this->jsonResponse(null, 500);
    }

    public function delete($id)
    {
        if(!$this->table->get($id))
            return $this->jsonResponse(null, 404);

        if($this->table->delete($id) > 0)
            return $this->jsonResponse(null, 204);

        return $this->jsonResponse(null, 500);
    }
}