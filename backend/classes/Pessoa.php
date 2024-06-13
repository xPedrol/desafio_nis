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
}