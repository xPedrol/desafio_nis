<?php
require_once 'configuracoes/Cookie.php';

class Pessoa_Controlador
{
    private $pessoas;
    private $quantidade;

    public function __construct()
    {
        $this->pessoas = Cookie::get('pessoas') ?? [];
        $this->quantidade = intval(Cookie::get('quantidade_pessoas')) ?? 0;;
        Cookie::set('pessoas', $this->pessoas);
        Cookie::set('quantidade_pessoas', $this->quantidade);

    }

    public function get_pessoas()
    {
        return $this->pessoas;
    }

    public function set_pessoa($pessoa)
    {
        $this->pessoas[] = $pessoa;
        Cookie::set('pessoas', $this->pessoas);
    }

    public function get_quantidade()
    {
        return $this->quantidade;
    }

    public function set_quantidade($quantidade)
    {
        $this->quantidade = $quantidade;
        Cookie::set('quantidade_pessoas', $this->quantidade);
    }

    public function adicionar_pessoa(Pessoa $pessoa)
    {
        if ($this->buscar_pessoa_nis($pessoa->get_nis()) !== null){
            return new Exception('Pessoa já cadastrada');
        }
        $this->set_pessoa($pessoa);
        $this->set_quantidade($this->get_quantidade() + 1);
        return $pessoa;
    }

    public function buscar_pessoa_nis($nis)
    {
        if ($this->quantidade == 0) return null;
        foreach ($this->pessoas as $pessoa) {
            if ($pessoa->get_nis() == $nis) {
                return $pessoa;
            }
        }
        return null;
    }
}
