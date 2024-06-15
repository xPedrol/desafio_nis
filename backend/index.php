<?php
require_once 'api/index.php';
require_once 'api/Rota.php';
require_once 'controladores/Pessoa_Controlador.php';
// Classe responsavel por iniciar a API. Aqui pegamos o método e parametros da aplicação, fazemos alguns tratamentos e passamos as informaçõe
// para as demais classes.

class Index
{
    public function iniciar_api(): void
    {
        try {
            // API e Rota poderiam ser uma classe só mas achei melhor separar para tornar o codigo mais legivel.
            $api = new Api();
            $rota = new Rota();


            $metodo = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';
            // Precisamos passar o metodo da requisição para Rota afim de filtar as rotas de acordo com os metodos que cada uma permite.
            $rota->set_metodo($metodo);
            $caminho_rota = null;
            if ($metodo === 'GET') {
                $rota->set_parametros($_GET);

            }
            if ($metodo === 'POST') {
                $rota->set_parametros($_POST);
            }
            if (isset($_GET['rota'])) {
                $caminho_rota = $_GET['rota'];
            }
            // É necessário enviar o caminho da rota via uma variavel tipo GET chamada rota.
            if (!$caminho_rota) {
                $api->enviar_resposta(array(
                    'conteudo' => 'Por favor especifique uma rota atraves de "?rota="',
                    'status' => '400'
                ));
            }
            $api->enviar_resposta($rota->chamar_funcao($caminho_rota));
        } catch (Exception $e) {
            $api->enviar_erro($e->getMessage());
        }
    }
}

$index = new Index();
$index->iniciar_api();