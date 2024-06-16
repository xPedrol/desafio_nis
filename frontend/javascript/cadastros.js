const cadastros = document.getElementById('cadastros');
const nis_div = document.getElementById("nis-div");
const descricao_erro = document.getElementById("descricao-erro");

const buscar_pessoas = () => {
    fetch('http://localhost/desafio_nis/backend/?rota=buscar_pessoas', {
        method: 'GET',
    }).then(response => response.json())
        .then(data => {
            if (data.status !== 200) throw new Error(data.conteudo);
            if (data.conteudo.length === 0) throw new Error('Nenhum cadastro foi encontrado.')
            descricao_erro.style.display = 'none';
            nis_div.style.display = 'block';
            let trs = '';
            for (const pessoa of data['conteudo']) {
                trs += `<tr class="odd:bg-white even:bg-gray-50">
                <td scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap">
                   ${pessoa['nome']}
                </td>
                <td class="py-4">
                    ${pessoa['nis']}
                </td>
            </tr>`;
            }
            cadastros.innerHTML += trs;
        }).catch((erro) => {
        nis_div.style.display = "none";
        descricao_erro.style.display = "block";
        descricao_erro.innerText = erro;
    });
}

const buscar_pessoa_nis = () => {
    const nis = document.querySelector('#nis-campo').value;
    fetch(`http://localhost/desafio_nis/backend/?rota=buscar_pessoa_nis&nis=${nis}`, {
        method: 'GET',
    }).then(response => response.json())
        .then(data => {
            if (data.status !== 200) throw new Error(data.conteudo);
            const pessoa = data['conteudo'];
            descricao_erro.style.display = 'none';
            nis_div.style.display = 'block';
            cadastros.innerHTML = `<tr class="odd:bg-white even:bg-gray-50">
                <td scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap">
                   ${pessoa['nome']}
                </td>
                <td class="py-4">
                    ${pessoa['nis']}
                </td>
            </tr>`;

        }).catch((erro) => {
        nis_div.style.display = "none";
        descricao_erro.style.display = "block";
        descricao_erro.innerText = erro;
    });
}

buscar_pessoas();