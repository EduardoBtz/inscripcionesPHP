<!DOCTYPE html>
<html lang="en">
<head>
    <title>Maestros</title>
    <meta charset="UTF-8">
    <link href="NavigationStyle.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="modificacion.js"></script>
</head>

<body>
<h1> Sistema de inscripciones </h1>
<nav>
    <ul>
        <li><a href="Maestros.php">Maestros</a></li>
        <li><a href="Salones.php">Salones</a></li>
        <li><a href="Cursos.php">Grupos programados</a></li>
        <li><a href="Reportes.php">Generar reportes</a></li>
    </ul>
    </br></br></br>
    <a id="botonSalir" href="login.html">Salir del sistema</a>
</nav>

<div id="main">
    <h2>Lista de maestros</h2>
    <table id="tabla-maestros">
        <tr>
            <th>Nómina</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>#Cursos</th>
            <th>Email</th>
            <th style="color: darkred;">Borrar?</th>
        </tr>
        <?php

        $db = new mysqli('localhost:3306', 'root', 'root123', 'inscripciones');
        $instruccion = "SELECT nomina, nombre, telefono, email, cant_cursos FROM maestros";

        $result = mysqli_query($db, $instruccion);
        $db->close();

        $active = $row['active'];
        $count = mysqli_num_rows($result);

        while($row = mysqli_fetch_array($result)) {
            $activeNomina = $row['nomina'];
            echo "<tr>
                <td id='$activeNomina' class='celda' ondblclick='ajax_post(this)'>".$row['nomina']."</td>
                <td id='$activeNomina' class='celda' ondblclick='ajax_post(this)'>".$row['nombre']."</td>
                <td id='$activeNomina' class='celda' ondblclick='ajax_post(this)'>".$row['telefono']."</td>
                <td id='$activeNomina' class='celda' ondblclick='ajax_post(this)'>".$row['email']."</td>
                <td id='$activeNomina' class='celda' ondblclick='ajax_post(this)'>".$row['cant_cursos']."</td>
                <td><button id='$activeNomina' onclick='ajax_borrar(this)'>Borrar </button></td>
            </tr>";
        }
        ?>
    </table><br>
    <button onclick='ajax_agregar()'>Agregar nuevo maestro</button>
</div>

</body>
</html>
