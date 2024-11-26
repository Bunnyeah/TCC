const imgperfilAdd = document.getElementById("imgperfilAdd");
const imgperfilEdit = document.getElementById("imgperfilEdit");
const newprodutoimg = document.getElementById("newprodutoimg");
const editprodutoimg = document.getElementById("editprodutoimg");
const maxFileSize = 2 * 1024 * 1024; // 2 MB em bytes
const messageContainer = document.getElementById("messageContainer");
let container = document.getElementById("containertotal");
let popupadd = document.getElementById("addproduto");
let popupedit = document.getElementById("editproduto");
let close = document.getElementsByClassName("close");

Array.from(close).forEach(element => {
    element.addEventListener("click", () => {
        popupadd.style.display = "none";
        popupedit.style.display = "none";
        container.style.opacity = "100%";
    });
});

function addproduto() {
    popupadd.style.display = "flex";
    container.style.opacity = "30%";
}

function deleteproduto(){
    let deleteID = document.getElementById('delete').value
    console.log("ID recebido:", deleteID); // Log do ID recebido

    fetch(`./functions_adm/deleteproduto.php?id=${deleteID}`)
        .then(response => response.json()
        ).then(data => { 
            // messageContainer.classList.add("alert-success"); //Desativar scrollbar
            // messageContainer.innerHTML = data.message;
            location.reload();
            
        }).catch(error => {
            console.error('Erro ao buscar os dados do produto');
        });
        // location.href = '../adm/produtos.php';
}

function editproduto(produtoID) {
    console.log("ID recebido:", produtoID); // Log do ID recebido
    popupedit.style.display = "flex";
    container.style.opacity = "30%";

    fetch(`./functions_adm/editproduto.php?id=${produtoID}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro na rede');
            }
            return response.json();
        })
        .then(data => {
            console.log("Dados do produto:", data);

            // Preencher os campos do formulário de edição
            if (!data.error) {
                document.getElementById('id_produto_edit').value = produtoID; // Preencher o ID do produto
                document.getElementById('nome_produto_edit').value = data.Nome_produto;
                document.getElementById('preco_und_edit').value = data.Preco_Und;
                document.getElementById('qtd_stock_edit').value = data.Qtd_stock;
                document.getElementById('descricao_edit').value = data.Descricao;
                document.getElementById('selectcategoria').value = data.fk_categoria_ID;
                document.getElementById('delete').value = produtoID;

                // Atualizar a imagem se necessário
                imgperfilEdit.src = "../assets/imgs/produtos/" + data.imagem || '../assets/imgs/logo.jpg'; // Caminho padrão se imagem não existir
            } else {
                alert(data.error);
                messageContainer.classList.add("alert-danger"); //Desativar scrollbar
                messageContainer.innerHTML = data.error;
            }
        })
        .catch(error => {
            console.error('Erro ao buscar os dados do produto:', error);
        });
}

        newprodutoimg.onchange = event => {
            const [file] = newprodutoimg.files;
            if (file) {
                if (file.size > maxFileSize) {
                    imgperfilAdd.src = "../assets/imgs/logo.jpg"; // Limpa a imagem
                } else {
                    imgperfilAdd.src = URL.createObjectURL(file);
                }
            }
        };

        // Funcionalidade de seleção de arquivo para editar produtos
        document.getElementById("inputFileEdit").addEventListener("click", () => {
            editprodutoimg.click();
        });

        editprodutoimg.onchange = event => {
            const [file] = editprodutoimg.files;
            if (file) {
                if (file.size > maxFileSize) {
                    imgperfilEdit.src = "../assets/imgs/logo.jpg"; // Limpa a imagem
                } else {
                    imgperfilEdit.src = URL.createObjectURL(file);
                }
            }
        };