<?php
require_once 'classes/Pessoa.php';
require_once 'controladores/Pessoa_Controlador.php';
require_once 'configuracoes/Cookie.php';
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class Pessoa_Controlador_Test extends TestCase
{
    private $controlador;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controlador = new Pessoa_Controlador();
    }


    #[Test] public function teste_buscar_pessoa_vazio()
    {
        $resultado = $this->controlador->buscar_pessoa(new Pessoa('João'));
        // Verifique se o conteúdo retornado é o esperado
        $this->assertNull($resultado);
    }

    /**
     * @throws Exception
     */
    #[Test] public function teste_adicionar_pessoa()
    {
        $teste_pessoa = $this->controlador->adicionar_pessoa(new Pessoa('João'));
        $this->assertInstanceOf(Pessoa::class, $teste_pessoa);
    }

    #[Test] public function teste_adicionar_pessoa_repetida()
    {
        $pessoa = new Pessoa('João');
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Pessoa já cadastrada');
        print_r($this->controlador->get_pessoas());
        $this->controlador->adicionar_pessoa($pessoa);
        $this->controlador->adicionar_pessoa($pessoa);
    }

    /**
     * @throws Exception
     */
    #[Test] public function teste_buscar_pessoa_nao_existe()
    {
        $this->controlador->adicionar_pessoa(new Pessoa('João', '62347678011'));
        $pessoa = new Pessoa('Carlos', '12345678911');
        $resultado = $this->controlador->buscar_pessoa($pessoa);
        // Verifique se o conteúdo retornado é o esperado
        $this->assertNull($resultado);
    }

    /**
     * @throws Exception
     */
    #[Test] public function teste_buscar_pessoa_existe()
    {
        $pessoa = new Pessoa('João');
        $this->controlador->adicionar_pessoa($pessoa);
        $resultado = $this->controlador->buscar_pessoa($pessoa);
        $this->assertInstanceOf(Pessoa::class, $resultado);
    }

}
