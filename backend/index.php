<?php

require_once 'api/index.php';
require_once 'api/endpoint.php';
require_once 'controladores/pessoa_Controlador.php';

$api = new Api();
$endpoint = new Endpoint();
$metodo = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';
$api->set_metodo($metodo);
$api->enviar_resposta($endpoint->get_quantidade_pessoas());