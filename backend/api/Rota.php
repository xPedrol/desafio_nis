<?php
require_once 'classes/Pessoa.php';
require_once 'controladores/Pessoa_Controlador.php';

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
        $metodos = ['POST', 'GET'];
        if (!in_array($metodo, $metodos)) {
            return $this->enviar_erro('Método inválido');
        }
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

    // ROTAS

    public function buscar_pessoas()
    {
        if ($this->metodo !== 'GET') return $this->enviar_erro('Método inválido');
        try {
            return array(
                'status' => 'sucesso',
                'conteudo' => $this->pessoa_controlador->get_pessoas()
            );
        } catch (Exception $e) {
            return $this->enviar_erro($e->getMessage());
        }


    }

    public function adicionar_pessoa()
    {
        if ($this->metodo !== 'POST') return $this->enviar_erro('Método inválido');
        try {
            $numeros = array();
            for ($i = 0; $i < 11; $i++) {
                $numeros[] = mt_rand();
            }
            $pessoa = new Pessoa($this->parametros['nome'], $numeros);
            $res = $this->pessoa_controlador->adicionar_pessoa($pessoa);
            if (!($res instanceof Pessoa)) throw $res;
            return $pessoa;
        } catch (Exception $e) {
            return $this->enviar_erro($e->getMessage());
        }


    }

    public function get_quantidade_pessoas()
    {
        if ($this->metodo !== 'GET') return $this->enviar_erro('Método inválido');
        try {
            return array(
                'status' => 'sucesso',
                'conteudo' => $this->pessoa_controlador->get_quantidade()
            );
        } catch (Exception $e) {
            return $this->enviar_erro($e->getMessage());
        }
    }

}