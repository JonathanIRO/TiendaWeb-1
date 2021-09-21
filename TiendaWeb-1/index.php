<?php 
include("php/iniciarSesion.php");
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
    <link rel="icon" href="Vista/img/icons/logo.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda web - SUPERCITO</title>
    <link href="Vista/css/menu.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/63dcfdd2cf.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <div class="padre">
        <header class="header">
            <div class="menu margen-interno">
                <div class="logo">
                    <img src='Vista/img/icons/logo.png'>
                    <a href="index.php"> <b>Tienda Web</b> </a>
                    <small><i>Todo lo que necesitas con un solo clic</i></small>
                </div>
                <div class="box">
                    <div class="container-1">
                        <span class="icon"><i class="fa fa-search"></i></span>
                        <input type="search" id="search" placeholder="Buscar..." />
                    </div>
                </div>
                <div class="Carrito">
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>
                <div class="usuario">
                <?php 
                    if (isset($_SESSION['username'])) {
                        $user_name = $_SESSION['username'];
                        $query = $conexion->query("select * from usuario where email ='".$user_name."'");
                        $datos = mysqli_fetch_array($query);
                        $nombre = $datos['nombre'];
                        $apellidos = $datos['apellidos'];
                        echo '<p id="username" class="itemCabezal">Bienvenid@ '.$nombre.' '.$apellidos.'</p>';
                    }
                    ?>
                </div>
                <div class="sesion">
                    <?php 
                    if (!isset($_SESSION['username'])) {
                    echo '<a class="bar-der animacion textMenu" href="login.php">Iniciar sesión</a>';
                    }
                    if (isset($_SESSION['username'])) {
                    echo '<a class="bar-der animacion textMenu" href="php/cerrarSesion.php">Cerrar sesión</a>';
                    }
                    ?>
                </div>
            </div>
            <div class="texto-principal margen-interno">
                <a href="index.php" class="opciones">Inicio</a>
                <a href="catalogo.php" class="opciones">Ofertas</a>
                <a href="#categoria" class="opciones" class="opciones">Categorias</a>
                <a href="../HTML/ayuda.html" target="_blank" class="opciones"> Ayuda</a>
                <a href="../HTML/registroUsuario.html" class="opciones"> Usuario</a>
                <?php 
                    if (isset($_SESSION['username'])) {
                        $user_name = $_SESSION['username'];
                        $query = $conexion->query("select * from usuario where email ='".$user_name."'");
                        $datos = mysqli_fetch_array($query);
                        $idTipoUsuario = $datos['idTipoUsuario'];
                        if($idTipoUsuario == "2" || $idTipoUsuario == "3"){
                            echo '<a href="formularioArticulo.php" class="opciones"> Ingresar Articulo</a>';
                        } else {
                            echo '<a href="Vista/html/index-pago.html" class="opciones">Ingresar Forma de Pago</a>';
                        }
                    }
                    ?>
                
            </div>
        </header>
        <section class="section margen-interno">
            <div class="articulos">
                <?php 
                    if (!isset($_SESSION['username']) || isset($_SESSION['username'])) {
                        //Ver cantidad de articulos a mostrar
                        $query = $conexion->query('select COUNT(*) s from articulo where Imagen != "" and idCategoria = 2');
                        $datosArticulos = mysqli_fetch_array($query);
                        $cantidadArticulos = $datosArticulos['s'];
                        //echo '<p>'.$cantidadArticulos.'</p>';
                        //Consulta para obtener los articulos a mostrar
                        $query = $conexion->query('select * from articulo where Imagen != "" and idCategoria = 2');
                        if ($cantidadArticulos > 6) {
                            $cantidadArticulos = 6;
                        }
                        for ($i = 0; $i < $cantidadArticulos; $i++) {
                            $datoArticulo = mysqli_fetch_array($query);
                            $titulo = $datoArticulo['Nombre'];
                            $descripcion = $datoArticulo['Descripcion'];
                            $imagen = $datoArticulo['Imagen'];
                            echo '<article class="article">
                            <img src="data:image/jpeg;base64,'.base64_encode($imagen) .' "/>
                                <h3>Disponible</h3>
                                <h4>'.$titulo.'</h4>
                                <p>'.$descripcion.'</p>
                                <a href="#">Agregar <i class="fas fa-shopping-cart"></i></a>
                            </article>';
                        }
                    }
                ?>
                <nav class="navegacion">
                    <a href="#">Inicio</a>
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">Final</a>
                </nav>
            </div>

        </section>
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
                            <label>ITLeon,
                                Republica Fria
                                Manuel Doblado
                                Casa # 27</label>
                        </div>
                        <div class="row2">
                            <img src="Vista/img/smartphone.png">
                            <label>+1-829-395-2064</label>
                        </div>
                        <div class="row2">
                            <img src="Vista/img/contact.png">
                            <label>atencion.clientes@Supercito.com</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-footer">
                <div class="footer">
                    <div class="copyright">
                        © 2021 Todos los Derechos Reservados | <a href="">Supercito</a>
                    </div>

                    <div class="information">
                        <a href="">Informacion Compañia</a> | <a href="">Privacion y Politica</a> | <a href="">Terminos
                            y
                            Condiciones</a>
                    </div>
                </div>
            </div>

        </footer>
    </div>
</body>

</html>