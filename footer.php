<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>

@import url('https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap');
    #contatos_lista, #outras_lista{
        display: flex;
        flex-direction: column;
    }
    #contatos_lista img{
        width: 25px;
        height: 25px;
    }
    #outras_lista img{
        width: 35px;
        height: 35px;
    }
    #formas_pag_lista{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    #footer{
        overflow: hidden;
        bottom: 0 !important;
        width: 100vw;
        height: 37.5vh;
        background-color: #133A41;
        margin: 0;
        color: white;
        font-size: 0.75rem;
        font-family: "Comfortaa", sans-serif;
    }
    .footertitulo{
        font-size: 1.25rem;
        padding-bottom: 1vh;
        text-align: center;
    }
    #footer a{
        text-decoration: none;
        color: white;
        display: flex;
        flex-direction: row;
        align-items: center;
        padding-bottom:1rem;
        justify-content: start;
    }
    #footer img{
        margin-right: 1rem;
    }
    #footercontainer{
        padding-top: 2vh;
        display: flex;
        justify-content: space-around;
    }
    #linhaformpagamento{
        width: 50%;
        margin-left: 25%;
    }
    </style>
</head>
<body>
    <footer id="footer"> 
        <div id="footercontainer">
            <div>
                <p class="footertitulo">Contatos</p>
                <div id="contatos_lista">
                    <a href="https://www.instagram.com/promel_boituva/"><img src="./assets/imgs/icons/instagram.svg" alt="icone Instagram"> Instagram</a>
                    <a href=""><img src="./assets/imgs/icons/whatsapp.svg" alt="icone Whatsapp"> Whatsapp</a>
                    <a href="https://web.facebook.com/lojapromel/?_rdc=1&_rdr"><img src="./assets/imgs/icons/facebook.svg" alt="icone Facebook"> Facebook</a>
                </div>
            </div>

            <div>
                <p class="footertitulo">Conheça-nos</p>
                <p>Sobre a Loja</p>
                <p>Sobre o Cliente</p>
            </div>

            <div>
                <p class="footertitulo"style="padding: 0;">Formas de Pagamento</p>
                <hr id="linhaformpagamento">
                <div id="formas_pag_lista">
                    <img src="./assets/imgs/formas_pagamento/Metodo 01.png">
                    <img src="./assets/imgs/formas_pagamento/Metodo 02.png">
                    <img src="./assets/imgs/formas_pagamento/Metodo 03.png">
                    <img src="./assets/imgs/formas_pagamento/Metodo 04.png">
                </div>
                <p style="text-align: center;padding-top:2vh">Ou se preferir você pode pagar pela loja fisíca</p>
            </div>

            <div>
                <p class="footertitulo">Outras Plataformas</p>
                <div id="outras_lista">
                    <a href=""><img src="./assets/imgs/outras_plataformas/shoppe.svg" alt="icone Shopee"> Shopee</a>
                    <a href=""><img src="./assets/imgs/outras_plataformas/mercado_livre.svg" alt="icone Mercado Livre"> Mercado Livre</a>
                    <a href="https://www.tiktok.com/@promel_alex?_t=8rfkLdLY46J&_r=1"><img src="./assets/imgs/outras_plataformas/tiktok.svg" alt="icone TikTok"> TikTok</a>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <p class="text-center" style="font-size: 14px">© 2024 Armazém Brasil - Desenvolvido por Davi Natan Bianchi, Edisom Coelho Junior, Nicolas Moro Mota e Vitor Melendes Diardina. Todos os direitos reservados</p>
                </div>
            </div>

    </footer>
</body>
</html>