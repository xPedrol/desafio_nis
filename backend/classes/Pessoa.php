<?php

class Pessoa
{
    private $nome;
    private $nis;

    public function __construct($nome)
    {
        $this->nome = $nome;
    }

    public function get_nome()
    {
        return $this->nome;
    }

    public function set_nome($nome)
    {
        $this->nome = $nome;
    }

    public function get_nis()
    {
        return $this->nis;
    }

    public function set_nis($nis)
    {
        $this->nis = $nis;
    }
    // Método responsavel por converter o objeto de Pessoa para um vetor comum. Facilitando o envio dos dados via JSON.
    public function converter()
    {
        return array(
            "nome" => $this->nome,
            "nis" => $this->nis
        );
    }
}