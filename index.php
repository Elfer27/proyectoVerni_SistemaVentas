<?php

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="css/estiloIndex.css" rel="stylesheet" type="text/css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>Iniciar Sesión</title>
    </head>
    <body id="containerIndex">
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container" id="containerLogin">
            <br>
            <br>
                
            <form id="formlogin" class="form" action="modules/Login/loginController.php" method="post">
                <h1>Iniciar Sesión</h1>
                <br>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="user" name="user" placeholder="Aqui va tu usuario">
                    <label for="user">Usuario</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="clave" name="clave" placeholder="Aqui va tu contraseña">
                    <label for="clave">Contraseña</label>
                </div>
                <br>
                <button type="submit" class="btn btn-warning" id="btnIngresar">Ingresar al Sistema</button>
                <p class="mt-4 mb-3 text-muted">Fernando Orellana&copy; 2021</p>
                <br>
            </form>

        </div>
        <!-- JS DE BOOSTRAP -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>