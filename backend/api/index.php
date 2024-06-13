<?php

class Api
{
    private $metodo;

    public function __construct()
    {
        $this->metodo = NULL;
    }

    public function set_metodo($metodo)
    {
        $metodos = ['POST', 'GET'];
        if (!in_array($metodo, $metodos)) {
            $this->enviar_erro('Método inválido');
        }
        $this->metodo = $metodo;
    }

    public function get_metodo()
    {
        return $this->metodo;
    }

    public function enviar_erro($messagem = 'Erro ao executar programa')
    {
        $retorno = array();
        $retorno['status'] = 'ERROR';
        $retorno['message'] = $messagem;
        $this->enviar_resposta($retorno);
    }

    public function enviar_resposta($retorno = array())
    {
        header('Content-type: application/json');
        echo json_encode($retorno);
        die(1);
    }
}