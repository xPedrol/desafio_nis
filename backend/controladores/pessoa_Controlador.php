<?php
require_once 'configuracoes/Cookie.php';

class Pessoa_Controlador
{
    private static $instance;
    private $pessoas;
    private $quantidade;

    public function __construct()
    {
        $this->pessoas = Cookie::get('pessoas') || array();
        $this->quantidade = Cookie::get_int('quantidade_pessoas') ?? rand(10, 100);;
        Cookie::set('pessoas', $this->pessoas);
        Cookie::set('quantidade_pessoas', $this->quantidade);

    }

    public function get_pessoas()
    {
        return $this->pessoas;
    }

    public function get_quantidade()
    {
        return $this->quantidade;
    }

    public function adicionar_pessoa(Pessoa $pessoa)
    {
        $this->pessoas[] = $pessoa;
    }

    public function buscar_pessoas(Pessoa $pessoa)
    {
        foreach ($this->pessoas as $pessoa) {
            if ($pessoa == $pessoa) {
                return $pessoa;
            }
        }
        return null;
    }
}
