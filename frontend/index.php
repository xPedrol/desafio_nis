<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="estilos/output.css" rel="stylesheet">
    <title>Cadastrar - Número de Identificação Social</title>
</head>
<body>
<div class="bg-radial-pattern h-screen bg-size-50 flex justify-center items-center min-w-md mx-2">
    <div class="flex flex-col">
        <main class="p-10 max-w-md bg-white border-[1px] border-gray-400 rounded-md">
            <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Número de Identificação Social</h2>

            <div id="nis-sucesso-div" class="w-full hidden">
                <p class="mt-4 text-lg leading-8 text-green-500">Parabens! NIS gerado com sucesso.</p>
                <div class="mt-6 text-center">
                    <p class="text-xl font-bold leading-8 tracking-[0.3em]" id="nis-p"></p>
                </div>
            </div>
            <div id="nis-erro-div" class="w-full hidden mt-4">
                <p class="w-full text-red-500 text-center text-lg" id="descricao-erro-p"></p>
                <p class="text-sm leading-8 text-red-500 text-center">Clique <a
                            class="text-blue-500" href="index.php">aqui</a> para tentar novamente</p>
            </div>
            <div id="nis-div">
                <p class="mt-4 text-lg leading-8 text-gray-500">Preencha o campo abaixo com um nome para gerar NIS.</p>
                <form class="mt-6 flex max-w-md gap-x-4" onsubmit="gerar_nis();return false;">
                    <label for="nome" class="sr-only">Nome Completo</label>
                    <input id="nome" name="nome" type="text" required
                           class="min-w-0 flex-auto rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-400 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           placeholder="Insira seu nome">
                    <button type="submit"
                            class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        Gerar
                    </button>
                </form>
            </div>
            <div class="w-full border-b-[2px] my-3 h-0.5"></div>
            <div class="w-full flex flex-col">
                <p class="mt-4 text-lg leading-8 text-gray-500">Para buscar algum NIS já cadastrado clique no botão
                    abaixo.</p>
                <a href="cadastros.php"
                   class="mt-3 rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm text-center font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                    Buscar cadastros
                </a>
            </div>
        </main>
    </div>
</div>
<script src="javascript/index.js"></script>
</body>
</html>