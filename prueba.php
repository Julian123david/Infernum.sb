
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="shortcut icon" href="view/img/LOGO.jpeg">
	<link rel="stylesheet" href="view/nav/navgerente.css">
    <link rel="stylesheet" href="view/css/index.css">


    <title>INFERNUM.SB</title>

<header >
        <nav class="navegacion">
            <ul class="menu0">
                <li><a href=""><img class="logo" src="view/img/logo2.png"></a></li>
                
            </ul>
            <ul class="menu3">
                <li><a class="logout" href="view/login.php">Iniciar Sesion</a></li>
            <li><a href="view/IndexCarro.php"><img class="logo3" src="view/img/carrito2.png"></a></li>
            </ul>
            <ul class="menu1">
                <li><a href="#">Home</a></li>
                <li><a href="view/ProductosCategoria.php">Ropa</a>

            </ul>
        </nav>
    </header>


<body>
<div class="body">
    <div class="container">
        <div class="mySlides">
            <img src="view/img/headerindex.jpg" alt="imagen-1">
        </div>
        <div class="mySlides">
            <img src="https://neuromarketing.la/web/wp-content/uploads/2022/02/shutterstock_327644201.jpg" alt="">
        </div>
        <div class="mySlides">
            <img src="https://i0.wp.com/chocale.cl/wp-content/uploads/2022/03/descuentos.jpg?fit=1200%2C800&ssl=1" alt="">
        </div>
        
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="elements">
            <span class="quadrate" onclick="currentSlide(1)"></span>
            <span class="quadrate" onclick="currentSlide(2)"></span>
            <span class="quadrate" onclick="currentSlide(3)"></span>
        </div>
    </div>
</div>

<div class="catDiv">
    <h1>Compra Por Categorias</h1>
<div class="categorias">
    
    <div class="imgCat">
        <a href="view/productosCompra/camisetas.php">
        <img src="https://www.texor.co/wp-content/uploads/2019/11/T-SHIRT-BLANCA.jpg"></a>
        <h1 onclick="location.href='view/productosCompra/camisetas.php'">Camisetas</h1>
    </div>

    <div class="imgCat">
        <a href="view/productosCompra/camisas.php">
        <img src="https://cdn.shopify.com/s/files/1/0451/2310/9020/products/30065296003-camisa-convertible-para-hombre-cat-costa-rica-277325_1024x1024.jpg?v=1658564930"></a>
        <h1 onclick="location.href='view/productosCompra/camisas.php'">Camisas</h1>
    </div>

    <div class="imgCat">
        <a href="view/productosCompra/jeans.php">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYAmVUGMAekH58SWZu4dlD-EMz7ryXARg16yqH-kulZJG9Y0R0XVSjTAhDxAU5f_GYn74&usqp=CAU"></a>
        <h1 onclick="location.href='view/productosCompra/jeans.php'">Jeans</h1>
    </div>

    <div class="imgCat">
        <a href="view/productosCompra/gorros.php">
        <img src="https://http2.mlstatic.com/D_NQ_NP_958956-MCO48677929132_122021-W.jpg"></a>
        <h1 onclick="location.href='view/productosCompra/gorros.php'">Gorros</h1>
    </div>

</div>
</div>
<br>
<div class="destacadosDiv">
    <div class="destacados">
        <h1>Productos Destacados</h1>
        <div class="productos2">
            
            <div class="productos">
                <a href="">
                    <img src="https://cdn.koaj.co/121828-thickbox_default/camiseta-unicolor-manga-corta.jpg">
                    <p>Camisa Negra<br>$75.00</p>
                </a>
            </div>

            <div class="productos">
                <a href="">
                    <img src="https://www.projectxparis.com/32132-home_default/tp21038.jpg">
                    <p>Jean slim Hombre<br>$80.00</p>
                </a>
            </div>

            <div class="productos">
                <a href="">
                    <img src="https://bajocero.com.co/wp-content/uploads/2019/12/GORRO-LANA-OVEJERO-BN2750-GRIS.jpg">
                    <p>Gorro Gris<br>$40.00</p>
                </a>
            </div>

            <div class="productos">
                <a href="">
                    <img src="https://www.dhresource.com/0x0/f2/albu/g20/M00/4B/B5/rBVaqGFweSCAf_O8AADK2QcBnEA468.jpg">
                    <p>Camisa C.Vaquero Algodon<br>79.00</p>
                </a>
            </div>

        </div>
    </div>
</div>


<div class="masPro">
    <h1>¡Mas Productos!</h1>
    <div class="masProDiv">
        <div class="masProDiv2">
            
            <div class="pro2">
                <a href="">
                    <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/f1b5d6c6da444b97bce9aa250100578a_9366/Gorro_Beanie_Adicolor_Cuff_(UNISEX)_Negro_ED8712_01_standard.jpg">
                    <label>gorro Negro<br>$50.000</label>
                </a>
            </div>

            <div class="pro2">
                <a href="">
                    <img src="https://www.arteluniformes.com/wp-content/uploads/2017/03/04015.jpg">
                    <label>Camisa Negra<br>$65.000</label>
                </a>
            </div>

            <div class="pro2">
                <a href="">
                    <img src="https://miscelandia.vtexassets.com/arquivos/ids/237271-800-auto?v=637793219777870000&width=800&height=auto&aspect=true">
                    <label>Jean Negro<br>$75.000</label>
                </a>
            </div>

            <div class="pro2">
                <a href="">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpiuUeizxxqWSfMwNpRA0W-xu95VMtBWaCAg&usqp=CAU">
                    <label>gorro azul<br>$45.000</label>
                </a>
            </div>

            <div class="pro2">
                <a href="">
                    <p>¡Y mucho Más!</p>
                </a>
            </div>

        </div>
    </div>
</div>

<section class="SectionFooter" >
<div class="footer" style="background-image: url('view/img/Footer.png'); 
    background-size: cover; background-repeat: no-repeat; background-position: top;">
    <div class="title">
        <h1>¡Contactanos!</h1>
    </div>
    <div class="quejas">
        <p>¿Quejas?</p>
        <p>¿Sugerencias?</p>
    </div>
    <div class="medioscontac">
        <table >
   <tr>
       <td class="icon3"><a href=""><img src="https://cdn.icon-icons.com/icons2/1826/PNG/512/4202011emailgmaillogomailsocialsocialmedia-115677_115624.png"></a></td>
       <td class="tabletext"><a href="">Correo</a></td>
   </tr>
   <tr>
       <td class="icon3"><a href=""><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/479px-WhatsApp.svg.png"></a></td>
       <td class="tabletext"><a href="">WhatsApp</a></td>
   </tr>
   <tr>
       <td class="icon3"><a href=""><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Instagram_logo_2016.svg/2048px-Instagram_logo_2016.svg.png"></a></td>
       <td class="tabletext"><a href="">Instagram</a></td>
   </tr>
</table>
    </div>
    <div class="Copyright">
        Copyright&copy; 2022 - Página creada por WareSoft - Todos los derechos reservados
        <br>
    </div>
    <!--<img src="view/img/Footer.png" class="fondo" >-->
</div>
</section>
</body>
<script src="view/js/slider.js"></script>
</html>