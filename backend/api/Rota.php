<?php
require_once 'classes/Pessoa.php';
require_once 'controladores/Pessoa_Controlador.php';
// Classe responsável pelas rotas da aplicação. Aqui controlamos os parametros e o método da requisição.
// Alem de encaminhar as requisições a suas respectivivas funcoções.
class Rota
{
    private Pessoa_Controlador $pessoa_controlador;
    private string $metodo;
    private array $parametros;

    public function __construct()
    {
        $this->pessoa_controlador = new Pessoa_Controlador();
    }

    public function set_parametros($parametros): void
    {
        $this->parametros = $parametros;
    }

    public function set_metodo($metodo): void
    {
        $this->metodo = $metodo;
    }

    public function chamar_funcao($funcao)
    {
        try {
            if (method_exists($this, $funcao)) {
                return $this->$funcao();
            } else {
                return $this->enviar_erro('Caminho não encontrada', 404);
            }
        } catch (Exception $e) {
            return $this->enviar_erro($e->getMessage(), $e->getCode());
        }
    }

    private function enviar_erro($e = 'Sem menssagem', $status = 404): array
    {
        if ($status === 0) $status = 500;
        return array(
            'status' => $status,
            'conteudo' => $e
        );
    }

    // ROTAS

    public function buscar_pessoas(): array
    {
        if ($this->metodo !== 'GET') return $this->enviar_erro('Método inválido', 405);
        try {
            return array(
                'conteudo' => $this->pessoa_controlador->converter_pessoas()
            );
        } catch (Exception $e) {
            return $this->enviar_erro($e->getMessage(), $e->getCode());
        }


    }

    public function buscar_pessoa_nis(): array
    {
        if ($this->metodo !== 'GET') return $this->enviar_erro('Método inválido', 405);
        if (!isset($this->parametros['nis'])) return $this->enviar_erro('NIS inválido', 400);
        try {
            $pessoa = $this->pessoa_controlador->buscar_pessoa_nis($this->parametros['nis']);
            if ($pessoa === null) return array(
                'status' => 404,
                'conteudo' => 'Cidadão não encontrado'
            );
            return array(
                'conteudo' => $pessoa->converter()
            );
        } catch (Exception $e) {
            return $this->enviar_erro($e->getMessage(), $e->getCode());
        }


    }

    public function adicionar_pessoa(): array
    {
        if ($this->metodo !== 'POST') return $this->enviar_erro('Método inválido', 405);
        try {
            $pessoa = new Pessoa($this->parametros['nome']);
            $this->pessoa_controlador->adicionar_pessoa($pessoa);
            return array(
                'conteudo' => $pessoa->converter(),
                'status' => 201
            );
        } catch (Exception $e) {
            return $this->enviar_erro($e->getMessage(), $e->getCode());
        }
    }

}