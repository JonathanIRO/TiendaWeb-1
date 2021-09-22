<?php 
    include "./php/iniciarSesion.php";
    session_start();
    if (isset($_SESSION['username'])) {
    // En caso contrario devolvemos a la página login.php
    header('Location: index.php');
    die();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Supersito</title>
    <link rel="icon" href="Vista/img/icons/logo.png">
    <!-- Bootstrap core CSS -->
    <link href="Vista/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="Vista/css/sign-in.css" rel="stylesheet">
</head>

<body class="bg-light text-center">
    <form class="form-signin" method="post">
        <?=
            $error;
        ?>
        <img class="mb-4" alt="" width="72" height="72" src="Vista/img/icons/logo.png">
        <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
        <label for="inputUser" class="sr-only">User</label>
        <input type="email" id="inputUser" name="username" class="form-control" required="" autofocus=""
            placeholder="Email">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña"
            required="">
        <div class="checkbox mb-3">
        </div>
        <button class="btn btn-block btn-dark btn-lg btn-outline-secondary text-white" type="submit" name="submit"
            value="Login">Entrar</button>
        <div class="checkbox mb-3">
        </div>
        <div class="btn-group">
            <a href="Vista/html/FormularioEmpleado.html" class="btn btn-secondary">Registro empleado</a>
            <a href="Vista/html/FormularioCliente.html" class="btn btn-secondary">Registro cliente</a>
        </div>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
    </form>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function() {
        $(document).on("click", "#entrar", function() {
            var usuario = document.getElementById('inputUser').value;
            var contrasena = document.getElementById('inputPassword').value;
            //alert(usuario + contrasena);
            event.preventDefault();
            $.ajax({
                method: 'POST',
                url: './php/iniciarSesion.php',
                data: {
                    usuario: usuario,
                    contrasena: contrasena
                }
            }).done(function(respuesta) {
                if (respuesta == 'Error') {
                    alert('Error')
                } else {
                    alert('WOW')
                }
            });
        });

    });
    </script>
</body>

</html>