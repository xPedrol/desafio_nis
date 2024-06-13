<?php
require_once 'configuracoes/Cookie.php';
// Classe responsável por gerir o vetor de pessoas. Aqui se encontra as regras de negocio para lidar com a gestão de pessoas cadastradas.
class Pessoa_Controlador
{

    public function __construct()
    {
        // Verificamos se as variaveis existem nos cookies, caso não existam elas são criadas.
        if (Cookie::vazio('pessoas')) {
            Cookie::set_array('pessoas', []);
        }
        if (Cookie::vazio('quantidade_pessoas')) {
            Cookie::set('quantidade_pessoas', 0);
        }

    }

    public function set_pessoa($pessoa)
    {
        $pessoas = $this->get_pessoas();
        $pessoas[] = $pessoa;
        Cookie::set_array('pessoas', $pessoas);
    }

    public function get_pessoas()
    {
        return Cookie::get_array('pessoas');
    }

    public function get_quantidade()
    {
        return intval(Cookie::get('quantidade_pessoas'));
    }

    public function set_quantidade($quantidade)
    {
        Cookie::set('quantidade_pessoas', $quantidade);
    }

    public function adicionar_pessoa(Pessoa $pessoa)
    {
        // Aqui verificamos se uma pessoa existe e geramos o NIS
        if ($this->buscar_pessoa($pessoa) !== null) {
            return new Exception('Pessoa já cadastrada');
        }
        $pessoa->set_nis(mt_rand(00000000000, 99999999999));
        $this->set_pessoa($pessoa);
        $this->set_quantidade($this->get_quantidade() + 1);
        return $pessoa;
    }


    public function buscar_pessoa(Pessoa $pessoa)
    {
        $pessoas = $this->get_pessoas();
        $quantidade = $this->get_quantidade();
        if ($quantidade == 0) return null;
        foreach ($pessoas as $pessoa_cadastrada) {
            if ($pessoa_cadastrada->get_nis() == $pessoa->get_nis() || $pessoa_cadastrada->get_nome() == $pessoa->get_nome()) {
                return $pessoa;
            }
        }
        return null;
    }
    // Esse método é necessário para converter o vetor de Pessoa para um formato suportavel pelo JSON
    public function formatar_pessoas()
    {
        $pessoas = $this->get_pessoas();
        $novo_vetor = [];
        foreach ($pessoas as $pessoa) {
            $novo_vetor[] = $pessoa->converter();
        }
        return $novo_vetor;
    }
}
