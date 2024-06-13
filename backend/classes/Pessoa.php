<?php

class Pessoa
{
    private $nome;
    private $nis;

    public function __construct($nome, $nis)
    {
        $this->nome = $nome;
        $this->nis = $nis;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNis()
    {
        return $this->nis;
    }

    public function setNis($nis)
    {
        $this->nis = $nis;
    }
}