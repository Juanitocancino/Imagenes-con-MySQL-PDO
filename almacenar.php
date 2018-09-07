<?php
// Conexion a la base de datos
require 'include/config.php';
$conexion = Conexion::singleton_conexion();
// Comprobamos si ha ocurrido un error.
if (!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
  echo "Ha ocurrido un error.";
}else{
  // Verificamos si el tipo de archivo es un tipo de imagen permitido.
  // y que el tamaño del archivo no exceda los 16MB
  //Tengan en cuenta que en la base de datos tengo un "mediumblob" que soporta los 16 MB
  $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
  $limite_kb = 16384;
  if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
    // Archivo temporal
    $imagen_temporal = $_FILES['imagen']['tmp_name'];
    // Tipo de archivo
    $tipo = $_FILES['imagen']['type'];
    // Leemos el contenido del archivo temporal en binario.
    $fp = fopen($imagen_temporal, 'r+b');
    $data = fread($fp, filesize($imagen_temporal));
    fclose($fp);
    //Aqui dejo un anexo extra para poder guardar acentos o caracteres especiales en la
    //base de datos, ya que por defaul estos datos los pondra con caracteres raros
    $name="Gárcia"; $name=utf8_decode($name);
    $SQL = 'INSERT INTO usuario (idUsuario, Nombre, Foto, tipo_imagen) VALUES (NULL, :nombre, :data, :tipo)';
    $sentence = $conexion -> prepare($SQL);
    $sentence -> bindParam(':data',$data,PDO::PARAM_STR);
    $sentence -> bindParam(':nombre',$name,PDO::PARAM_STR);
    $sentence -> bindParam(':tipo',$tipo,PDO::PARAM_STR);
    $sentence -> execute();
  }else{
    echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
  }
}
?>
