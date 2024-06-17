<?php
require_once 'classes/Pessoa.php';
require_once 'controladores/Pessoa_Controlador.php';

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

// Para questões de simplicidade, o banco de dados de teste é o mesmo banco de produção.
// Em um caso real, os bancos devem ser separados.
class Pessoa_Controlador_Test extends TestCase
{
    private $controlador;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controlador = new Pessoa_Controlador();
        $this->controlador->limpar_armazenamento();
    }


    #[Test] public function teste_buscar_pessoa_vazio()
    {
        $pessoa = new Pessoa('João');
        $resultado = $this->controlador->buscar_pessoa($pessoa);
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

    /**
     * @throws Exception
     */
    #[Test] public function teste_adicionar_pessoa_invalida()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Nome inválido');
        $this->controlador->adicionar_pessoa(new Pessoa(''));
    }

    #[Test] public function teste_adicionar_pessoa_repetida()
    {
        $pessoa = new Pessoa('João');
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Cidadão já cadastrado');
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

    #[Test] public function teste_converter_pessoas()
    {
        $this->controlador->adicionar_pessoa(new Pessoa('João'));
        $this->controlador->adicionar_pessoa(new Pessoa('Pedro'));
        $this->controlador->adicionar_pessoa(new Pessoa('Carlos'));
        $pessoas_vetor = $this->controlador->converter_pessoas();
        foreach ($pessoas_vetor as $pessoa) {
            $this->assertIsArray($pessoa);
            $this->assertNotInstanceOf(Pessoa::class, $pessoa);
        }
    }

    #[Test] public function teste_buscar_pessoa_nis_existe()
    {
        $pessoa = $this->controlador->adicionar_pessoa(new Pessoa('João'));
        $resultado = $this->controlador->buscar_pessoa_nis($pessoa->get_nis());
        $this->assertInstanceOf(Pessoa::class, $resultado);
    }

    #[Test] public function teste_buscar_pessoa_nis_invalido()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('NIS inválido');
        $this->controlador->buscar_pessoa_nis('');
    }

    #[Test] public function teste_buscar_pessoa_nis_nao_existe()
    {
        $resultado = $this->controlador->buscar_pessoa_nis('11111111111');
        $this->assertNull($resultado);
    }


}
