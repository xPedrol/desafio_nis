<?php
require_once 'configuracoes/Banco_de_Dados.php';

// Classe responsável por gerir o vetor de pessoas. Aqui se encontra as regras de negocio para lidar com a gestão de pessoas cadastradas.
class Pessoa_Controlador
{

    public function __construct()
    {
        Banco_de_Dados::criar_tabela();
    }

    public function limpar_armazenamento()
    {
        Banco_de_Dados::limpar();
    }

    private function adicionar_pessoa_banco(Pessoa $pessoa): bool
    {
        Banco_de_Dados::salvar($pessoa->converter());
        return true;
    }

    private function buscar_pessoas_banco(): array
    {
        $pessoas_banco = Banco_de_Dados::buscar();
        $pessoas_objeto = array();
        foreach ($pessoas_banco as $pessoa) {
            $pessoas_objeto[] = new Pessoa($pessoa['nome'], $pessoa['nis']);
        }
        return $pessoas_objeto;
    }

    public function adicionar_pessoa(Pessoa $pessoa): Pessoa
    {
        // Aqui verificamos se uma pessoa existe e geramos o NIS
        if ($this->buscar_pessoa($pessoa) !== null) {
            throw new Exception('Cidadão já cadastrado');
        }
        $nis = '';
        for ($i = 0; $i < 11; $i++) {
            $nis .= mt_rand(0, 9);
        }
        $pessoa->set_nis($nis);
        if (!$this->adicionar_pessoa_banco($pessoa)) {
            throw new Exception('Erro ao cadastrar pessoa');
        }
        return $pessoa;
    }


    public function buscar_pessoa(Pessoa $pessoa): ?Pessoa
    {
        $pessoas = $this->buscar_pessoas_banco();
        foreach ($pessoas as $pessoa_cadastrada) {
            if ($pessoa_cadastrada->get_nis() == $pessoa->get_nis() || $pessoa_cadastrada->get_nome() == $pessoa->get_nome()) {
                return $pessoa;
            }
        }
        return null;
    }

    public function buscar_pessoa_nis(string $nis): ?Pessoa
    {
        $pessoas = $this->buscar_pessoas_banco();
        foreach ($pessoas as $pessoa_cadastrada) {
            if ($pessoa_cadastrada->get_nis() == $nis) {
                return $pessoa_cadastrada;
            }
        }
        return null;
    }

    // Esse método é necessário para converter o vetor de Pessoa para um vetor associativo
    public function converter_pessoas(): array
    {
        $pessoas = $this->buscar_pessoas_banco();
        if ($pessoas == null) return [];
        $novo_vetor = [];
        foreach ($pessoas as $pessoa) {
            $novo_vetor[] = $pessoa->converter();
        }
        return $novo_vetor;
    }
}
