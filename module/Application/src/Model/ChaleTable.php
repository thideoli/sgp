<?php

namespace Application\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class ChaleTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function get($id = null)
    {
        if(!$id)
            return $this->tableGateway->select();

        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }

    public function save(Chale $chale)
    {
        $data = [
            'nome' => $chale->nome,
            'camaCasal'  => $chale->camaCasal,
            'camaSolteiro'  => $chale->camaSolteiro,
            'descricao'  => $chale->descricao,
        ];

        $id = (int) $chale->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->get($id)) {
            throw new RuntimeException(sprintf(
                'Cannot update chale with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function delete($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}