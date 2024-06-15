<?php

class Pessoa
{
    private string $nome;
    private string $nis;

    public function __construct($nome)
    {
        $this->nome = $nome;
    }

    public function get_nome(): string
    {
        return $this->nome;
    }

    public function set_nome($nome): void
    {
        $this->nome = $nome;
    }

    public function get_nis(): string
    {
        return $this->nis;
    }

    public function set_nis($nis): void
    {
        $this->nis = $nis;
    }

    // Método responsavel por converter o objeto de Pessoa para um vetor comum. Facilitando o envio dos dados via JSON.
    public function converter(): array
    {
        return array(
            "nome" => $this->nome,
            "nis" => $this->nis
        );
    }
}