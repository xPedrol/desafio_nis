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

    }

    public function limpar_armazenamento()
    {
        $_COOKIE = [];
    }

    public function set_pessoa(Pessoa $pessoa): bool
    {
        $pessoas = $this->get_pessoas();
        $pessoas[] = $pessoa;
        return Cookie::set_array('pessoas', $pessoas);
    }

    public function get_pessoas(): mixed
    {
        return Cookie::get_array('pessoas');
    }

    public function adicionar_pessoa(Pessoa $pessoa): Pessoa
    {
        // Aqui verificamos se uma pessoa existe e geramos o NIS
        if ($this->buscar_pessoa($pessoa) !== null) {
            throw new Exception('Pessoa já cadastrada');
        }
        $nis = '';
        for ($i = 0; $i < 11; $i++) {
            $nis .= mt_rand(0, 9);
        }
        $pessoa->set_nis($nis);
        if (!$this->set_pessoa($pessoa)) {
            throw new Exception('Erro ao cadastrar pessoa');
        }
        return $pessoa;
    }


    public function buscar_pessoa(Pessoa $pessoa): ?Pessoa
    {
        $pessoas = $this->get_pessoas();
        foreach ($pessoas as $pessoa_cadastrada) {
            if ($pessoa_cadastrada->get_nis() == $pessoa->get_nis() || $pessoa_cadastrada->get_nome() == $pessoa->get_nome()) {
                return $pessoa;
            }
        }
        return null;
    }

    public function buscar_pessoa_nis(string $nis): ?Pessoa
    {
        $pessoas = $this->get_pessoas();
        foreach ($pessoas as $pessoa_cadastrada) {
            if ($pessoa_cadastrada->get_nis() == $nis) {
                return $pessoa_cadastrada;
            }
        }
        return null;
    }

    // Esse método é necessário para converter o vetor de Pessoa para um formato suportavel pelo JSON
    public function formatar_pessoas(): array
    {
        $pessoas = $this->get_pessoas();
        if ($pessoas == null) return [];
        $novo_vetor = [];
        foreach ($pessoas as $pessoa) {
            $novo_vetor[] = $pessoa->converter();
        }
        return $novo_vetor;
    }
}
