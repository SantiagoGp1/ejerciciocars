<?php
    include_once("DBconect.php");

    if(isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['edad']) 
        && isset($_POST['categoria'])&& isset($_POST['marcacoche']) && isset($_POST['modelo'])
        && isset($_POST['numerocompetidor'])){

        if($_POST['nombres'] !== "" && $_POST['apellidos'] !== "" && $_POST['edad'] !== "" 
            && $_POST['categoria'] !== "" && $_POST['marcacoche'] !== "" && $_POST['modelo'] !== "" 
            && $_POST['numerocompetidor'] !== ""){

            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $edad = $_POST['edad'];
            $categoria = $_POST['categoria'];
            $marcacoche = $_POST['marcacoche'];
            $modelo = $_POST['modelo'];
            $numerocompetidor = $_POST['numerocompetidor'];

            $conexion = new Database;
            $confirm = $conexion->validarCorredor( $numerocompetidor);
            $contador=$resultado->rowCount();

            if($contador > 0){
                $confirm = 3;
            } else {
                $confirm = $conexion->Insertar($nombres, $apellidos, $edad, $categoria, $marcacoche, $modelo, $numerocompetidor);
            }
        } else {         
            $confirm = 2 ; //uno o mas campos están vacios
        }

    }
    header('Location: ../index.php?confirm='.$confirm)
?>