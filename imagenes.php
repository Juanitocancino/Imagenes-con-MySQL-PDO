<form action="almacenar.php" method="POST" enctype="multipart/form-data">
    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen" id="imagen" />
    <input type="submit" name="subir" value="Subir Imagen"/>
</form>

<!-- Por default invoco el primer registro de la base de datos...
este dato lo pueden estar cambiando, solamente lo deje aqui para que
fuera mas facil de ver como funciona despues de hacer un "insert"-->

<img src="include\obtenerimg.php?id=1">
