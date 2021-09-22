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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Vista/icomoon/fonts/style.css">
    <link rel="stylesheet" href="Vista/css/estilosI.css">
    <title>Tienda web - SUPERCITO</title>
    <!--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    -->
    <!--Página principal style-->
    <link rel="icon" href="Vista/img/icons/logo.png">
    <link href="Vista/css/menu.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/63dcfdd2cf.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!--Formulario style-->
    <link rel="stylesheet" href="Vista/css/styleForm.css">
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
                <div class="usaurio">
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
                <a href="../HTML/muestraCatologo.html" class="opciones">Ofertas</a>
                <a href="#categoria" class="opciones" class="opciones">Categorias</a>
                <a href="../HTML/ayuda.html" target="_blank" class="opciones"> Ayuda</a>
                <a href="../HTML/registroUsuario.html" class="opciones"> Usuario</a>
            </div>
        </header>

        <section class="section margen-interno">
        <!-- Formulario 
        <form action="../Controladores/ControlAltaA.php" method="post" enctype="multipart/form-data">
            idArticulo: <input type="number" name="idArticulo" id="idArticulo">
            idCategoria: <input type="number" name="idCategoria" id="idCategoria">
            <input type="text" value="Nombre" name="Nombre">
            <textarea name="Descripcion" id="Descripcion" cols="30" rows="10">Descripcion</textarea> <input type="text"
                value="Marca" name="Marca">
            Precio: <input type="number" name="Precio" step="0.01" min="0">
            Unidad: <input type="number" name="Unidad">
            Existencias: input type="number" name="Existencias"
            Imagen: <input type="file" name="Imagen" id="Imagen" multiple>
            <input type="submit" value="Agregar">
        </form>-->

        <!--Formulario para articulo-->
        <form action="Controladores/AltaArticulo.php" method="POST"class="form-register" enctype="multipart/form-data">
        <h4>Formulario Registro Articulo</h4>
        <input class="controls" type="number" name="idCategoria" id="idCategoria" placeholder="IdCategoria" required min=1 max=1>
        <input class="controls" type="text" name="nombre" id="nombre" placeholder="Nombre" required>
        <input class="controls" type="text" name="descripcion" id="descripcion" placeholder="Descripcion" required>
        <input class="controls" type="text" name="marca" id="marca" placeholder="Marca" required>
        <input class="controls" type="number" name="precio" id="precio" placeholder="Precio" required>
        <input class="controls" type="text" name="unidad" id="unidad" placeholder="Unidad" required>
        <input class="controls" type="number" name="existencias" id="existencias" placeholder="Existencias" required>
        <input class="controls" type="file" name="imagen" id="imagen" multiple required>
        <input class="botons" type="submit" value="Registrar">
        </form>

        </section>



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
                        <a href="">Informacion Compañia</a> | <a href="">Privacion y Politica</a> | <a href="">Terminos
                            y
                            Condiciones</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Pie de página -->

    </div>
</body>

</html>