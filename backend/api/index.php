<?php

// Classe responsável por enviar a resposta da requisição, seja sucesso ou erro.
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
        if (isset($retorno['status'])) {
            http_response_code($retorno['status']);
        } else {
            $retorno['status'] = 200;
            http_response_code(200);
        }
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
        echo json_encode($retorno);
        die(1);
    }
}