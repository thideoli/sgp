<?php

namespace Application\Model;

class Chale
{
    public $id;
    public $nome;
    public $camasCasal;
    public $camasSolteiro;
    public $descricao;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->nome = !empty($data['nome']) ? $data['nome'] : null;
        $this->camasCasal  = !empty($data['camasCasal']) ? $data['camasCasal'] : 0;
        $this->camasSolteiro  = !empty($data['camasSolteiro']) ? $data['camasSolteiro'] : 0;
        $this->descricao  = !empty($data['descricao']) ? $data['descricao'] : null;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}