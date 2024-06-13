<?php

require_once 'api/index.php';
require_once 'api/Rota.php';
require_once 'controladores/Pessoa_Controlador.php';

class Index
{
    public function iniciar_api()
    {
        $api = new Api();
        $rota = new Rota();
        $metodo = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';
        $rota->set_metodo($metodo);
        if ($metodo == 'GET') {
            $rota->set_parametros($_GET);
        }
        if ($metodo == 'POST') {
            $rota->set_parametros($_POST);
        }
        $caminho_rota = null;
        if (isset($_GET['endpoint'])) {
            $caminho_rota = $_GET['endpoint'];
        }
        if (!$caminho_rota) {
            $api->enviar_resposta('Por favor especifique um endpoint');
        }
        $api->enviar_resposta($rota->chamar_funcao($caminho_rota));
    }
}

$index = new Index();
$index->iniciar_api();