const cadastros_tbody = document.getElementById('cadastros-tbody');
const nis_div = document.getElementById("nis-div");
const descricao_erro_p = document.getElementById("descricao-erro-p");
const url_base = 'http://localhost/desafio_nis/backend/';
const buscar_pessoas = () => {
    fetch(`${url_base}?rota=buscar_pessoas`, {
        method: 'GET',
    }).then(response => response.json())
        .then(data => {
            if (data.status !== 200) throw new Error(data.conteudo);
            if (data.conteudo.length === 0) throw new Error('Nenhum cadastro foi encontrado.')
            descricao_erro_p.style.display = 'none';
            nis_div.style.display = 'block';
            let trs = '';
            for (const pessoa of data['conteudo']) {
                trs += `<tr class="odd:bg-white even:bg-gray-50">
                <td scope="row" class="py-4 pr-3 font-medium text-gray-900 whitespace-nowrap">
                   ${pessoa['nome']}
                </td>
                <td class="py-4">
                    ${pessoa['nis']}
                </td>
            </tr>`;
            }
            cadastros_tbody.innerHTML += trs;
        }).catch((erro) => {
        nis_div.style.display = "none";
        descricao_erro_p.innerText = erro;
        descricao_erro_p.style.display = "block";
    });
}

const buscar_pessoa_nis = () => {
    const nis = document.querySelector('#nis-campo').value;
    fetch(`${url_base}?rota=buscar_pessoa_nis&nis=${nis}`, {
        method: 'GET',
    }).then(response => response.json())
        .then(data => {
            if (data.status !== 200) throw new Error(data.conteudo);
            const pessoa = data['conteudo'];
            descricao_erro_p.style.display = 'none';
            nis_div.style.display = 'block';
            cadastros_tbody.innerHTML = `<tr class="odd:bg-white even:bg-gray-50">
                <td scope="row" class="py-4 pr-3 font-medium text-gray-900 whitespace-nowrap">
                   ${pessoa['nome']}
                </td>
                <td class="py-4">
                    ${pessoa['nis']}
                </td>
            </tr>`;

        }).catch((erro) => {
        nis_div.style.display = "none";
        descricao_erro_p.innerText = erro;
        descricao_erro_p.style.display = "block";
    });
}

buscar_pessoas();