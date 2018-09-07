# Imagenes-con-MySQL-PDO
Pequeña demostración de como poder insertar imagenes en MySQL utilizando PDO de PHP
# Para correr este ejemplo:
1. Por lógica es tener una Base de datos MySQL
  + En esta base de datos debe de existir los encabezados (idUsuario, Foto, tipo_imagen)
  + 'idUsuario' debe de ser auto incrementable y llave primaria.
  + 'Foto' debe de ser "mediumblob"
  + 'tipo_imagen' Tiene que ser texto o varchar (si es varchar tiene que tener en cuenta que los tipos de imagenes cambian... por ejemplo la imagen que yo utilice guardo el dato 'image/png')
2. Este e jercicio funciona con PDO, asi que recomiendo utilizar PHP 5.4.0 en adelante
