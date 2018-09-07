<?php
// Conexion a la base de datos
require 'config.php';
$conexion = Conexion::singleton_conexion();
//Nos aseguramos que el Id sea mayor a 1
if ($_GET['id'] > 0){
    // Consulta de búsqueda de la imagen.
    $SQL = "SELECT Foto, tipo_imagen FROM usuario WHERE idUsuario={$_GET['id']}";
    $sentence = $conexion -> prepare($SQL);
    $sentence -> execute();
    $datos = $sentence -> fetchAll();
    $datos=$datos[0];//lectura de la linea capturada
    $imagen = $datos['Foto']; // Datos binarios de la imagen.
    $tipo = $datos['tipo_imagen'];  // Mime Type de la imagen.
    // Mandamos las cabeceras al navegador indicando el tipo de datos que vamos a enviar.
    header("Content-type: $tipo");
    // A continuación enviamos el contenido binario de la imagen.
    echo $imagen;
}
?>
