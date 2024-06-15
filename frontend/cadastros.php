<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="estilos/output.css" rel="stylesheet">
    <link href="estilos/utils.css" rel="stylesheet">
    <title>Número de Identificação Social</title>
</head>
<body>
<div class="bg-radial-gradient flex justify-center items-center min-w-md mx-2">
    <div class="flex flex-col">
        <div class="p-10 w-full max-w-md  bg-white border-[1px] border-gray-400 rounded-md">
            <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Número de Identificação Social</h2>

            <div id="nis-div">
                <p class="mt-4 text-lg leading-8 text-gray-500">Lista de todos os NIS cadastrados.</p>

                <p class="mt-4 text-lg leading-8 text-red-500 text-center" id="sem-cadastros">Nenhum cadastro foi
                    encontrado.</p>
                <div class="relative overflow-x-auto mt-4 hidden" id="cadastros-tabela">
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