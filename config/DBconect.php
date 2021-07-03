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
            $resultado = $conexion->validarCorredor( $numerocompetidor);
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
?><?php 

class Database {
    
    public $db; //controladores db
    private static $dns = "mysql:host=localhost;dbname=mqueencars"; //url de la BD
    private static $user = "root"; //usaurio de la conexion
    private static $pass = ""; //contraseña del usuario
    private static $instance; //instancia de la conexion

    public function __construct(){
        $this->db = new PDO(self::$dns, self::$user, self::$pass);
    }

    public static function getInstance(){
        if(!isset(self::$instance)){
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }
    

    public function insertar($nombres, $apellidos, $edad, $categoria, $marcacoche, $modelo, $numerocompetidor){

        try {
            $conexion = Database::getInstance(); //obtiene la instancia de la Clase
            $query = $conexion->db->prepare("INSERT INTO mcqueencar (nombres, apellidos, edad, categoria, marcacoche, modelo, numerocompetidor ) 
                                            VALUES (:nombres, :apellidos, :edad, :categoria, :marcacoche, :modelo, :numerocompetidor)");
            $query->execute(
                array(
                    ':nombres' => $nombres,
                    ':apellidos' => $apellidos,
                    ':edad' => $edad,
                    ':categoria' => $categoria,
                    ':marcacoche' => $marcacoche,
                    ':modelo' => $modelo,
                    ':numerocompetidor' => $numerocompetidor


                )
            );

            return 1; //retorna 1 si fue exitoso

        } catch(PDOException $error){
            return 0; // retorna 0 si falla
        }
        
    }

    public function validarCorredor($numerocompetidor){
        $conexion = Database::getInstance();
        $query = $conexion->db->prepare("SELECT numerocompetidor FROM mcqueencar WHERE numerocompetidor=:numerocompetidor");
        $query->execute(
            array(
                ":numerocompetidor" => $numerocompetidor
            )  
            );
            return ($query);
    }
    public function datosCorredores(){
        $conexion= Database::getInstance();
        $query=$conexion->db->prepare('SELECT * from macqueencars');
        $query ->execute();
        return $query;
    }
    

}

?>