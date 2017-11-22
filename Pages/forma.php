<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
    <meta http-equiv="Content-Type" charset="UTF-8" />

    <title>Modificación "en línea" desde una página web</title>

    <link rel="StyleSheet" type="text/css" href="tabla.css"/>
    <script type="text/javascript" src="modificacion.js"></script>

</head>

<body>
<h1>Lista de usuarios</h1>


<table id="tabla-usuarios">
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Dirección</th>
        <th>Código Postal</th>
        <th>Ciudad</th>
        <th>Hijos</th>
        <th>Email</th>
        <th></th>

    </tr>

    <?php

    $db = new mysqli('localhost:8889', 'root', 'root', 'usuario');
    $sql = "SELECT * FROM registrados";

    $result = mysqli_query($db, $sql);
    $db->close();

    $active = $row['active'];

    while($row = mysqli_fetch_array($result))
    {
        $id = (string)$row['id'];

        echo
            "<tr>
                <td id="."nombre-".$id." class='celda' ondblclick='ajax_post(this)'>".$row['nombre']."</td>
                <td id="."apellido-".$id." class='celda' ondblclick='modificar(this)'>".$row['apellido']."</td>
                <td id="."direccion-".$id." class='celda' ondblclick='modificar(this)'>".$row['direccion']."</td>
                <td id="."codigo-".$id." class='celda' ondblclick='modificar(this)'>".$row['codigo']."</td>
                <td id="."ciudad-".$id." class='celda' ondblclick='modificar(this)'>".$row['ciudad']."</td>
                <td id="."hijos-".$id." class='celda' ondblclick='modificar(this)'>".$row['hijos']."</td>
                <td id="."email-".$id." class='celda' ondblclick='modificar(this)'>".$row['email']."</td>
                <td><button id='$id' onclick='ajax_borrar(this)'>Borrar fila</button></td>
        </tr>";

    }
    ?>
</table>
<br>
<button onclick='ajax_agregar()'>Agregar fila</button>

</body>
</html>