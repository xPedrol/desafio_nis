<?php

class Api
{
    public function __construct()
    {
        $this->metodo = NULL;
    }

    public function enviar_erro($messagem = 'Erro ao executar programa')
    {
        $retorno = array();
        $retorno['status'] = 'erro';
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