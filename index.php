<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insercion en BD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" href="#">Formulario Ingreso</span></a>
                <a class="nav-link" href="./mostrar.php">Listado</a>
        </div>
    </nav>

    <div class="d-flex justify-content-center">
        <div class="card mt-5 col-md-5">
            <div class="card-header">
                Prueba
            </div>
            <div class="card-body">
                <?php

                if (isset($_GET['confirm'])) {
                    if ($_GET['confirm'] === "0") {
                        echo '<div class="alert alert-danger" role="alert">Dato no ingresado</div>';
                    }
                    if ($_GET['confirm'] === "1") {
                        echo '<div class="alert alert-success" role="alert">Qshao</div>';
                    }
                    if ($_GET['confirm'] === "2") {
                        echo '<div class="alert alert-danger" role="alert">Uno o mas campos estan vacios</div>';
                    }
                    if ($_GET['confirm'] === "3") {
                        echo '<div class="alert alert-danger" role="alert">Usuario ya registrado</div>';
                    }
                } 

                ?>
                <form action="./config/insertar.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Categoria</label>
                        <select class="form-control" id="categoria" name="categoria">
                            <option>Amateur</option>
                            <option>SemiSenior</option>
                            <option>Senior</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="marcacoche" name="marcacoche" placeholder="Marca coche">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="numerocompetidor" name="numerocompetidor" placeholder="Numero Competidor">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Añadir registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>