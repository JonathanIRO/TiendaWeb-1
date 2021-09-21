<?php 
#include("./php/iniciarSesion.php");
#session_start();
session_start();
if (!isset($_SESSION['username'])) {
    // En caso contrario devolvemos a la página login.php
    //header('Location: login.php');
    //die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Vista/icomoon/fonts/style.css">
    <link rel="stylesheet" href="Vista/css/estilosI.css">
    <title>TiendaWeb Supersito</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <link rel="icon" href="Vista/img/icons/logo.png">
</head>

<body>

    <?php

    $carrito_mio = $_SESSION['carrito'];
    $_SESSION['carrito'] = $carrito_mio;
    $totalcantidad=0;

    // contamos nuestro carrito
    if (isset($_SESSION['carrito'])) {
        for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
            if ($carrito_mio[$i] != NULL) {
                $total_cantidad = $carrito_mio['cantidad'];
                $total_cantidad++;
                $totalcantidad += $total_cantidad;
            }
        }
    }
    ?>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: red;"><i class="fas fa-shopping-cart"></i> <?php echo $totalcantidad;?></a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    <!-- END NAVBAR -->



    <!-- Ventana CARRITO -->
    <div class="modal fade" id="modal_cart" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Carrito</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">



                    <div class="modal-body">
                        <div>
                            <div class="p-2">
                                <ul class="list-group mb-3">
                                    <?
                                    if (isset($_SESSION['carrito'])) {
                                        $total = 0;
                                        for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
                                            if ($carrito_mio[$i] != NULL) {
                                    ?>
                                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                    <div class="row col-12">
                                                        <div class="col-6 p-0" style="text-align: left; color: #000000;">
                                                            <h6 class="my-0">Cantidad: <?php echo $carrito_mio[$i]['cantidad'] ?> : <? echo $carrito_mio[$i]['titulo']; // echo substr($carrito_mio[$i]['titulo'],0,10); echo utf8_decode($titulomostrado)."..."; 
                                                                                                                                    ?></h6>
                                                        </div>
                                                        <div class="col-6 p-0" style="text-align: right; color: #000000;">
                                                            <span class="text-muted" style="text-align: right; color: #000000;"><? echo $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];    ?> $</span>
                                                        </div>
                                                    </div>
                                                </li>
                                    <?
                                                $total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                                            }
                                        }
                                    }
                                    ?>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span style="text-align: left; color: #000000;">Total (MEX)</span>
                                        <strong style="text-align: left; color: #000000;"> $<?php
                                                                                            if (isset($_SESSION['carrito'])) {
                                                                                                $total = 0;
                                                                                                for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
                                                                                                    if ($carrito_mio[$i] != NULL) {
                                                                                                        $total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                            echo $total; ?> MXN</strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-primary" href="Vista/html/index-pago.html">Pagar</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a type="button" class="btn btn-primary" href="borrarcarro.php">Vaciar carrito</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END VENTANA CARRITO -->

    <div id="bar-nav">
        <div id="logo">
            <img src="Vista/img/logo.jpg" alt="Mi logo" id="imagenLogo">
        </div>
        <form id="busqueda">
            <input type="text" name="palabra" id="txtBusqueda" placeholder="Buscar...">
            <button type="submit" value="Buscar" id="btnBuscar"><span class="icon-search"></span></button>
        </form>
        <a class="btnMenu icon-align-justify"></a>
        <div id="der" class="derOcultar">
            <a class="bar-der animacion textMenu" href="login.php">Iniciar sesión</a>
            <?php 
            if (isset($_SESSION['username'])) {
            echo '<a class="bar-der animacion textMenu" href="php/cerrarSesion.php">Cerrar sesión</a>';
            }
            ?>
            <!--a class="bar-der animacion textMenu" href="">Pedidos</a-->
            <!--a class="bar-der animacion carrito" href=""><span class="icon-shopping-cart"></a-->
        </div>
    </div>


    <!-- Cards -->
    <div class="cards-content">
        <div class="container">
            <?php
            // while ($fila=$stmt->fetch_assoc()) {
            //     echo '
            //     <div class="card">
            //         <div class="imgBx">
            //             <img src="data:image/jpg;base64, '.base64_encode($fila['imagen']).'"alt="">
            //         </div>
            //         <div class="content">
            //             <h2>'.$fila['nombre'].'</h2>
            //             <h3>Descripcion: <a class="descripcion" href="#">Leer más...</a></h3>
            //             <h3>Precio: $'.$fila['precio'].'</h3>
            //             <input type="button" value="Agregar" id="comprar">
            //         </div>
            //     </div>';
            // }
            ?>
            <div class="card">
                <div class="imgBx">
                    <img src="Vista/img/reloj1.jpg" alt="">
                </div>
                <div class="content">
                    <form id="formulario" name="formulario" method="post" action="cart.php">
                        <input name="precio" type="hidden" id="precio" value="10" />
                        <input name="titulo" type="hidden" id="titulo" value="articulo 1" />
                        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
                        <h2>Carta</h2>
                        <h3>Descripcion: <a class="descripcion" href="#">Leer más...</a></h3>
                        <h3>Precio: $10</h3>
                        <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                        <!--input type="button" value="Agregar" id="comprar"-->
                        </form>
                </div>
            </div>
            <div class="card">
                <div class="imgBx">
                    <img src="Vista/img/tenis2.jpg" alt="">
                </div>
                <div class="content">
                    <form id="formulario" name="formulario" method="post" action="cart.php">
                        <input name="precio" type="hidden" id="precio" value="10" />
                        <input name="titulo" type="hidden" id="titulo" value="articulo 1" />
                        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
                        <h2 class="card-title">Carta</h2>
                        <h3>Descripcion: <a class="descripcion" href="#">Leer más...</a></h3>
                        <h3>Precio:</h3>
                        <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                        <!--input type="button" value="Agregar" id="comprar"-->
                        </form>
                </div>
            </div>
            <div class="card">
                <div class="imgBx">
                    <img src="Vista/img/tenis3.jpg" alt="">
                </div>
                <div class="content">
                    <form id="formulario" name="formulario" method="post" action="cart.php">
                        <input name="precio" type="hidden" id="precio" value="10" />
                        <input name="titulo" type="hidden" id="titulo" value="articulo 1" />
                        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
                        <h2 class="card-title">Carta</h2>
                        <h3>Descripcion: <a class="descripcion" href="#">Leer más...</a></h3>
                        <h3>Precio:</h3>
                        <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                        <!--input type="button" value="Agregar" id="comprar"-->
                        </form>
                </div>
            </div>
            <div class="card">
                <div class="imgBx">
                    <img src="Vista/img/cubrebocas.png" alt="">
                </div>
                <div class="content">
                    <form id="formulario" name="formulario" method="post" action="cart.php">
                        <input name="precio" type="hidden" id="precio" value="10" />
                        <input name="titulo" type="hidden" id="titulo" value="articulo 1" />
                        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
                        <h2 class="card-title">Carta</h2>
                        <h3>Descripcion: <a class="descripcion" href="#">Leer más...</a></h3>
                        <h3>Precio:</h3>
                        <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                        <!--input type="button" value="Agregar" id="comprar"-->
                        </form>
                </div>
            </div>
            <div class="card">
                <div class="imgBx">
                    <img src="Vista/img/audifonos.jpg" alt="">
                </div>
                <div class="content">
                    <form id="formulario" name="formulario" method="post" action="cart.php">
                        <input name="precio" type="hidden" id="precio" value="10" />
                        <input name="titulo" type="hidden" id="titulo" value="articulo 1" />
                        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
                        <h2 class="card-title">Carta</h2>
                        <h3>Descripcion: <a class="descripcion" href="#">Leer más...</a></h3>
                        <h3>Precio:</h3>
                        <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                        <!--input type="button" value="Agregar" id="comprar"-->
                        </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Cards -->

    <!-- Pie de página -->
    <footer>
        <div class="container-footer-all">
            <div class="container-body">
                <div class="colum1">
                    <h1>Mas informacion de la compañia</h1>
                    <p>Esta compañia se dedica a la venta de propiedades con el
                        proposito de darte un hogar y puedas disfrutar de un lindo
                        espacio con la ventaja de tener amueblado y decorado el hogar.</p>
                </div>
                <div class="colum2">
                    <h1>Redes Sociales</h1>
                    <div class="row">
                        <img src="Vista/img/facebook.png">
                        <label>Siguenos en Facebook</label>
                    </div>
                    <div class="row">
                        <img src="Vista/img/twitter.png">
                        <label>Siguenos en Twitter</label>
                    </div>
                    <div class="row">
                        <img src="Vista/img/instagram.png">
                        <label>Siguenos en Instagram</label>
                    </div>
                    <div class="row">
                        <img src="Vista/img/google-plus.png">
                        <label>Siguenos en Google Plus</label>
                    </div>
                    <div class="row">
                        <img src="Vista/img/pinterest.png">
                        <label>Siguenos en Pinteres</label>
                    </div>
                </div>
                <div class="colum3">
                    <h1>Informacion Contactos</h1>
                    <div class="row2">
                        <img src="Vista/img/house.png">
                        <label>La Romana,
                            Republica Dominicana
                            Manuel del Cabral
                            Casa # 27</label>
                    </div>
                    <div class="row2">
                        <img src="Vista/img/smartphone.png">
                        <label>+1-829-395-2064</label>
                    </div>
                    <div class="row2">
                        <img src="Vista/img/contact.png">
                        <label>somoshome@gmail.com</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-footer">
            <div class="footer">
                <div class="copyright">
                    © 2017 Todos los Derechos Reservados | <a href="">CorpHome</a>
                </div>

                <div class="information">
                    <a href="">Informacion Compañia</a> | <a href="">Privacion y Politica</a> | <a href="">Terminos y
                        Condiciones</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Pie de página -->
</body>
<script src="Vista/js/btnMenu.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>

</html>