const buscar_pessoas = () => {
    const cadastros = document.getElementById('cadastros');
    fetch('http://localhost/desafio/backend?endpoint=buscar_pessoas', {
        method: "GET",
        mode: 'cors',
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(response => response.json())
        .then(data => {
            if (data['conteudo'] === []) return;
            document.getElementById('sem-cadastros').style.display = 'none';
            document.getElementById('cadastros-tabela').style.display = 'block';
            let trs = '';
            for (const pessoa of data['conteudo']) {
                trs += `<tr class="odd:bg-white even:bg-gray-50">
                <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap">
                   ${pessoa['nome']}
                </th>
                <td class="py-4">
                    ${pessoa['nis']}
                </td>
            </tr>`
            }
            cadastros.innerHTML += trs;
        })
        .catch(erro => console.error('Erro:', erro));
}

buscar_pessoas();