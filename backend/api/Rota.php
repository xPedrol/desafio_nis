<?php
require_once 'classes/Pessoa.php';
require_once 'controladores/Pessoa_Controlador.php';
// Classe responsável pelas rotas da aplicação. Aqui controlamos os parametros e o método da requisição.
// Alem de encaminhar as requisições a suas respectivivas funcoções.
class Rota
{
    private $pessoa_controlador;
    private $metodo;
    private $parametros;

    public function __construct()
    {
        $this->pessoa_controlador = new Pessoa_Controlador();
    }

    public function set_parametros($parametros)
    {
        $this->parametros = $parametros;
    }

    public function set_metodo($metodo)
    {
        $this->metodo = $metodo;
    }

    public function get_metodo()
    {
        return $this->metodo;
    }


    public function chamar_funcao($funcao)
    {
        try {
            if (method_exists($this, $funcao)) {
                return $this->$funcao();
            } else {
                return $this->enviar_erro('Função inválida');
            }
        } catch (Exception $e) {
            return $this->enviar_erro($e->getMessage(), 404);
        }
    }

    private function enviar_erro($e = 'Sem menssagem', $status = 404)
    {
        return array(
            'status' => $status,
            'conteudo' => $e
        );
    }

    // ROTAS

    public function buscar_pessoas()
    {
        if ($this->metodo !== 'GET') return $this->enviar_erro('Método inválido');
        try {
            return array(
                'conteudo' => $this->pessoa_controlador->formatar_pessoas()
            );
        } catch (Exception $e) {
            return $this->enviar_erro($e->getMessage());
        }


    }

    public function adicionar_pessoa()
    {
        if ($this->metodo !== 'POST') return $this->enviar_erro('Método inválido');
        if (!isset($this->parametros['nome'])) return $this->enviar_erro('Nome inváido');
        if (trim($this->parametros['nome']) === "") return $this->enviar_erro('Nome inváido');
        try {
            $pessoa = new Pessoa($this->parametros['nome']);
            $res = $this->pessoa_controlador->adicionar_pessoa($pessoa);
            if (!($res instanceof Pessoa)) throw $res;
            return array(
                'conteudo' => $pessoa->converter(),
                'status' => 201
            );
        } catch (Exception $e) {
            return $this->enviar_erro($e->getMessage(), 400);
        }


    }

}