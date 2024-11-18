            <nav id="mobileNavbar">
                <div class="toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </nav>

            <nav id="navbar">
                <div id="logo"><a href="../homepage.php"><img src="../assets/imgs/logo.jpg" alt="Logo Promel"></a></div>
                <div id="user_menu">
                    <div class="icone title"><img src="../assets/imgs/icons/Group.svg" style="margin-right: 10px;">Minha Conta</div>
                    <div id="user_pages">
                        <div class="linha"><div class="seta"></div><a class="botao" href="./perfil.php"><p>Perfil</p></a></div>
                        <div class="linha"><div class="seta"></div><a class="botao" href="./alterarsenha.php"><p>Trocar Senha</p></a></div>


                    </div>
                    <div id="sair"><a href="../config/logout.php"><img src="../assets/imgs/icons/logoutbranco.svg"><p>Sair</p></a></div>
                    </div>
            </nav>

            <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap');

            * {margin: 0; padding: 0; box-sizing: border-box;}

            body {font-family: "Comfortaa", sans-serif; font-size: 1rem; margin: 0;}

            a{color: #ffffff; text-decoration: none;}

                #navbar {
                    overflow: hidden;
                    top: 0;
                    z-index: 2;
                    display: flex; 
                    flex-direction: column;
                    background-color: #133A41;
                    color: #ffffff;
                    height: 100vh;
                    width: 20vw;
                    padding: 0;
                    position: fixed !important;
                    font-family: "Inter", sans-serif;
                    font-size:1rem;
                }
                
                #logo img {max-width: 100%; height: auto;}

                #user_menu {margin-left: 3vw;} /*! O traçado vertical (|) */

                #user_pages {
                    margin-left: 0.8vw; 
                    border-left: 0.4vh hsl(0, 0%, 80%) solid;
                    display: grid;
                }

                .title{
                    font-family: "Inter", sans-serif;  
                    font-size: 1rem;
                }

                .pagatual{font-weight: bold;}

                .icone {
                    margin-bottom: 2vh;
                }

                .botao {
                    position: relative;
                    cursor: pointer;
                    padding: 1vh;
                    top: 60%;
                }.seta{
                    min-width: 10.48px;
                    width: 1vw;
                    border: 0.2vh hsl(0, 0%, 80%) solid;
                    background-color: hsl(0, 0%, 80%);
                }.linha{
                    display: flex;
                    align-items: end;
                }
                #sair>a{
                    position: fixed;
                    bottom: 0;
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    justify-self: center;
                }
                #sair img{
                    padding-bottom:25%;
                    padding-right:25%;
                }

                @media (max-width: 767px){
                    .title{
                        font-size: 1rem;
                    }
                    .aberto{
                        transform: translateX(-100%);
                        visibility: visible;
                    }
                    .seta{
                        width: 10%;
                    }
                    
                    #navbar {
                        margin-top: 5vh;
                        width: 50vw;
                        z-index: 999;
                        position: fixed;
                        transition: 0.5s;
                        font-size: 0.8rem;
                        white-space: nowrap;
                        top: 0;
                        height: 96vh; /* Altura total da tela */
                        }
                        
                    
                    #mobileNavbar {
                        overflow: hidden;
                        position: fixed;
                        z-index: 1000; /* Mantenha acima de outros elementos */
                        width: 100vw; /* A largura deve ser 100% da tela */
                        height: 5vh;
                        background-color: #133A41;
                        top: 0; /* Para fixar no topo */
                    }
                
                    
                    .toggle{
                        z-index: 1;
                    }
                    .toggle span{
                        position: fixed;
                        margin-left: 1vh;
                        width: 35px;
                        height: 0.5vh;
                        background: white;
                        border-radius: 4px;
                    }.toggle span:nth-child(1){
                        top: 1vh;
                    }.toggle span:nth-child(2){
                        top: 2vh;
                    }.toggle span:nth-child(3){
                        top: 3vh;
                    }
                }
                </style>