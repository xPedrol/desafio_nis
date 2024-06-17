# Desafio NIS

Este é o guia de instalação e configuração para o projeto Desafio NIS. O projeto foi desenvolvido
separadamente em front-end e back-end, ambos utilizando PHP.
No back-end, foi desenvolvida uma API que armazena os dados utilizando cookies.
O front-end realiza buscas nessa API para alimentar a página.

## Pré-requisitos

Antes de começar, certifique-se de ter instalado:
- Um servidor local como XAMPP ou similar na sua máquina. [Baixar XAMPP](https://www.apachefriends.org/pt_br/download.html).
- Um banco de dados MySQL. [Baixar MySQL](https://dev.mysql.com/downloads/installer/).
- Composer para gerenciar pacotes no PHP. [Baixar Composer](https://getcomposer.org/download/).

## Instalação

1. Clone o repositório `desafio_nis` através da URL: https://github.com/xPedrol/desafio_nis.git.

2. Mova a pasta clonada `desafio_nis` para a pasta de projetos do seu servidor local. Por exemplo, se estiver usando
   XAMPP, mova para `caminho/para/xampp/htdocs/`.
   **Observação: Para evitar mover a pasta, o clone pode ser feito diretamente na pasta de projetos.**
3. Para configurar o banco de dados, crie um arquivo `.env` na raiz do diretório `/backend`. Copie os dados do arquivo `.env_exemplo`
   para o seu `.env`. Após isso, defina valores para as variáveis copiadas.
   **Lembrando que é necessário criar o banco de dados. Defina um nome e coloque-o na variável `BD_NAME` do `.env`. A tabela será criada automaticamente.**
4. Após as configurações acima, execute o comando `composer install` em um terminal no diretório `/backend`.

## Uso

Após seguir os passos de instalação, o projeto deve estar pronto para uso local.

Acesse o front-end pelo navegador e interaja com sua aplicação PHP. O caminho para acessar o front-end deve
ser `caminho/para/xampp/htdocs/desafio_nis/frontend`. Não esqueça de substituir `caminho/para/xampp/htdocs/` de acordo
com o servidor utilizado.

## Executando os testes

1. Os testes unitários foram criados utilizando `PhpUnit`. Para executá-los, digite `.\vendor\bin\phpunit` em um terminal no diretório `/banckend`.
