let addendereco = document.getElementById("addendereco");
let formDados = document.getElementById("dados");
let button = document.getElementById("submit");
let retornodados = document.getElementById("retornodados");
let verifendereco = document.getElementById("verifendereco");

function novoendereco(){
    formDados.style.display = "block";
    addendereco.style.display = "none";
}

function limpa_formulário_cep() {
    document.getElementById('rua').value = "";
    document.getElementById('bairro').value = "";
    document.getElementById('cidade').value = "";
    document.getElementById('uf').value = "";
    document.getElementById('ibge').value = "";
    button.style.display = "none"; // Esconde o botão Salvar
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        document.getElementById('rua').value = conteudo.logradouro;
        document.getElementById('bairro').value = conteudo.bairro;
        document.getElementById('cidade').value = conteudo.localidade;
        document.getElementById('uf').value = conteudo.uf;
        document.getElementById('ibge').value = conteudo.ibge;

        retornodados.style.display = "block"; // Exibe o endereço
        button.style.display = "block"; // Exibe o botão Salvar
        verifendereco.style.display = "none"; // Some com o botão verificar endereço
    } else {
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep() {
    let valor = document.getElementById("cep").value.replace(/\D/g, '');

    if (valor !== "") {
        var validacep = /^[0-9]{8}$/;

        if (validacep.test(valor)) {
            document.getElementById('rua').value = "...";
            document.getElementById('bairro').value = "...";
            document.getElementById('cidade').value = "...";
            document.getElementById('uf').value = "...";
            document.getElementById('ibge').value = "...";

            var script = document.createElement('script');
            script.src = 'https://viacep.com.br/ws/' + valor + '/json/?callback=meu_callback';
            document.body.appendChild(script);
        } else {
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } else {
        limpa_formulário_cep();
    }
}
