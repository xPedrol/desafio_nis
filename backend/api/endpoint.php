<?php
require_once 'controladores/pessoa_Controlador.php';

class Endpoint
{
    private $pessoa_controlador;

    public function __construct()
    {
        $this->pessoa_controlador = Pessoa_Controlador::getInstance();
    }

    public function endpoint_existe($endpoint)
    {
        return method_exists($this, $endpoint);
    }

    public function get_pessoas()
    {
        try {
            return array([
                'status' => 'sucesso',
                'conteudo' => $this->pessoa_controlador->get_pessoas()
            ]);
        } catch (Exception $e) {
            return array(
                'status' => 'erro',
                'mensagem' => $e->getMessage()
            );
        }

    }

}