const nis_div = document.getElementById("nis-div");
const nis_div_sucesso = document.getElementById("nis-div-sucesso");


const gerar_nis = () => {
    nis_div.style.display = "none";
    nis_div_sucesso.style.display = "block";
    fetch('http://localhost/desafio/backend?endpoint=buscar_pessoas', {
        method: "GET",
        mode: 'cors',
        headers: {'Content-Type': 'application/json',}
    }).then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.error('Erro:', error));
}