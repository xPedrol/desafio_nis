const nis_div = document.getElementById("nis-div");
const nis_div_sucesso = document.getElementById("nis-div-sucesso");
const nis_div_erro = document.getElementById("nis-div-erro");
const descricao_erro = document.getElementById("descricao-erro");
const nis_p = document.getElementById("nis-p");

const gerar_nis = () => {
    const nome = document.querySelector("#nome");
    nis_div.style.display = "none";
    const formData = new FormData();
    formData.append('nome', nome.value);
    fetch('http://localhost/desafio/backend/?endpoint=adicionar_pessoa', {
        method: "POST",
        body: formData
    }).then(response => response.json())
        .then((data) => {
            if (data.status === 201) {
                nis_div_sucesso.style.display = "block";
                nis_div_erro.style.display = "none";
                nis_p.innerText = data.conteudo.nis;
            } else {
                throw new Error(data.conteudo);
            }

        })
        .catch((erro) => {
            nis_div_sucesso.style.display = "none";
            nis_div_erro.style.display = "block";
            descricao_erro.innerText = erro;
        });
}