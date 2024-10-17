const form = document.querySelector(".filter");
const button = document.querySelector("botao_add");
const div = document.querySelectorAll(".categoria");

// Cores Selecionadas
const cores = ["#69C9D0", "#E0A072", "#5A3A3F", "#428390", "#2E555B"]
    
button.addEventListener("click", () => {
    if(form.classList.contains("displayNone")){
        form.classList.remove("displayNone");
    }
 })

form.addEventListener("click", (event) => {
    if(event.target == form){
        form.classList.add("displayNone");
    }
 })

let count = 0;

// Array.from(elemento) transforma os elementos em um array
Array.from(div).forEach(element => {
    // Quando atingir a ultima cor
    if(count >= cores.length){
        count = 0;
    }
    
    element.style.backgroundColor = `${cores[count]}`;
    count++
})
