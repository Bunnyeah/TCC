    var x = document.getElementById("mobileNavbar");
    var y = document.getElementById("navbar")
    x.addEventListener("click", () =>{
            y.classList.toggle("aberto")
    });


    //Para o InputFyle
    const button = document.getElementById("inputFile");
    const inputFile = document.querySelector("[type=file]");
    button.addEventListener("click", () => {
        // Simula um clique no input file
        inputFile.click()
    })