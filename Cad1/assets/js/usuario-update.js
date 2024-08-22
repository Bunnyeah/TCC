    var x = document.getElementById("mobileNavbar");
    var y = document.getElementById("navbar")
    x.addEventListener("click", () =>{
        if (y.style.display === "block") {
            y.style.display = "none";
            y.classList.add("transitionomg")
        } else {
            y.style.display = "block";
            y.classList.remove("transitionomg")
        }
    });
    

