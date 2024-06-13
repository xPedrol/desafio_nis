<?php
require_once 'controladores/pessoa_Controlador.php';

class Endpoint
{
    private $pessoa_controlador;

    public function __construct()
    {
        $this->pessoa_controlador = new Pessoa_Controlador();
    }

    public function endpoint_existe($endpoint)
    {
        return method_exists($this, $endpoint);
    }

    public function get_pessoas()
    {
        try {
            return array(
                'status' => 'sucesso',
                'conteudo' => $this->pessoa_controlador->get_pessoas()
            );
        } catch (Exception $e) {
            return $this->enviar_erro($e->getMessage());
        }

    }

    public function get_quantidade_pessoas()
    {
        try {
            return array(
                'status' => 'sucesso',
                'conteudo' => $this->pessoa_controlador->get_quantidade()
            );
        } catch (Exception $e) {
            return $this->enviar_erro($e->getMessage());
        }
    }

    private function enviar_erro($e = 'Sem menssagem')
    {
        return array(
            'status' => 'erro',
            'mensagem' => $e
        );
    }

}