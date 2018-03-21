<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class ChaleTable
{
    private $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function get($id = null)
    {
        if(!$id)
            return $this->tableGateway->select()->toArray();

        $id = (int) $id;

        return $this->tableGateway->select(['id' => $id])->current();
    }

    public function save(Chale $chale)
    {
        $data = [
            'nome' => $chale->nome,
            'camasCasal'  => $chale->camasCasal,
            'camasSolteiro'  => $chale->camasSolteiro,
            'descricao'  => $chale->descricao,
        ];

        $id = (int) $chale->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return $this->tableGateway->getLastInsertValue();
        }

         return $this->tableGateway->update($data, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->tableGateway->delete(['id' => (int) $id]);
    }
}