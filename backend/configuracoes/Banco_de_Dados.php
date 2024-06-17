<?php
require_once 'iniciar_env.php';

class Banco_de_Dados
{
    // Estabelece conexão com banco de dados.
    public static function conectar(): PDO
    {


        $servername = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];

        // Criar conexão PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Configurar o modo de erro do PDO para exceção
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

    // Armazena uma nome e nis de uma pessoa.
    public static function salvar(array $valores): void
    {
        $sql = "INSERT INTO pessoas (nome, nis) VALUES(:nome, :nis)";
        $conexao = Banco_de_Dados::conectar();
        $sql_preparada = $conexao->prepare($sql);
        $sql_preparada->bindParam(':nome', $valores["nome"]);
        $sql_preparada->bindParam(':nis', $valores["nis"]);
        $sql_preparada->execute();
    }

    // Busca todas as pessoas cadastradas.
    public static function buscar(): false|array
    {
        $conexao = Banco_de_Dados::conectar();
        $sql = "SELECT * FROM pessoas";
        $sql_preparada = $conexao->prepare($sql);
        $sql_preparada->execute();
        return $sql_preparada->fetchAll();
    }

    // Limpa a tabela pessoas. Usado para cada caso de teste.
    public static function limpar(): void
    {
        $conexao = Banco_de_Dados::conectar();
        $sql = "TRUNCATE TABLE pessoas";
        $conexao->exec($sql);
    }

    public static function criar_tabela(): void
    {
        $conexao = Banco_de_Dados::conectar();
        $exists = $conexao->query("SHOW TABLES LIKE 'pessoas'")->rowCount() > 0;

        if (!$exists) {
            // A tabela não existe, então é preciso criá-la.
            $sql = "CREATE TABLE pessoas (nome VARCHAR(200) NOT NULL, nis VARCHAR(12) NOT NULL, PRIMARY KEY (nome))";

            if (!($conexao->exec($sql) !== false)) throw new Exception('Erro ao criar tabela');
        }
    }
}