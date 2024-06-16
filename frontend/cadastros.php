<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="estilos/output.css" rel="stylesheet">
    <title>Número de Identificação Social</title>
</head>
<body>
<div class="bg-radial-pattern h-screen bg-size-50 flex justify-center items-center min-w-md mx-2">
    <div class="flex flex-col">
        <div class="p-10 w-full max-w-md  bg-white border-[1px] border-gray-400 rounded-md">
            <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Número de Identificação Social</h2>
            <div>
                <p class="mt-4 text-lg leading-8 text-gray-500">Preencha o campo abaixo com um NIS para buscar cidadão.</p>
                <form class="mt-6 flex max-w-md" onsubmit="buscar_pessoa_nis();return false;">
                    <label for="nis-campo" class="sr-only">Número de Identificação Social</label>
                    <input id="nis-campo" name="nis-campo" type="text" required
                           class="min-w-0 mr-4 flex-auto rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-400 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           placeholder="Insira um NIS para busca">
                    <button type="submit"
                            class="flex-none mr-1 rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        Buscar
                    </button>
                    <a href="cadastros.php"
                            class="flex-none rounded-md bg-red-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        Limpar
                    </a>
                </form>
            </div>
            <p class="mt-4 text-lg leading-8 text-gray-500">Lista de NIS
                encontrados.</p>
            <p class="w-full text-red-500 text-center text-lg hidden mt-4" id="descricao-erro"></p>
            <div id="nis-div" class="hidden mt-4">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs uppercase">
                        <tr>
                            <th scope="col" class="py-3">
                                Nome
                            </th>
                            <th scope="col" class="py-3">
                                NIS
                            </th>
                        </tr>
                        </thead>
                        <tbody id="cadastros">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="w-full border-b-[2px] my-3 h-0.5"></div>
            <div class="w-full flex flex-col">
                <p class="mt-4 text-lg leading-8 text-gray-500">Para cadastramento de NIS clique no botão abaixo.</p>
                <a href="index.php"
                   class="mt-3 rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm text-center font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                    Cadastrar NIS
                </a>
            </div>
        </div>
    </div>
</div>
<script src="javascript/cadastros.js"></script>
</body>
</html>