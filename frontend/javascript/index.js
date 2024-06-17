const nis_div = document.getElementById("nis-div");
const nis_sucesso_div = document.getElementById("nis-sucesso-div");
const nis_erro_div = document.getElementById("nis-erro-div");
const descricao_erro_p = document.getElementById("descricao-erro-p");
const nis_p = document.getElementById("nis-p");
const url_base = 'http://localhost/desafio_nis/backend/';
const gerar_nis = () => {
    const nome = document.querySelector("#nome");
    nis_div.style.display = "none";
    const formData = new FormData();
    formData.append('nome', nome.value);
    fetch(`${url_base}?rota=adicionar_pessoa`, {
        method: "POST",
        body: formData
    }).then(response => response.json())
        .then((data) => {
            if (data.status === 201) {
                nis_sucesso_div.style.display = "block";
                nis_p.innerText = data.conteudo.nis;
                nis_erro_div.style.display = "none";
            } else {
                throw new Error(data.conteudo);
            }

        })
        .catch((erro) => {
            nis_sucesso_div.style.display = "none";
            descricao_erro_p.innerText = erro;
            nis_erro_div.style.display = "block";
        });
}