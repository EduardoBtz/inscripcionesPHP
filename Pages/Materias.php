<!DOCTYPE html>
<html lang="en">
<head>
    <title>Materias</title>
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
    <h2>Lista de materias</h2>
    <table>
        <tr>
            <th>Clave</th>
            <th>Nombre</th>
            <th>Horas lab</th>
            <th style="color: darkred;">Borrar?</th>
        </tr>
        <?php

        $db = new mysqli('localhost:8889', 'root', 'root', 'babel');
        $instruccion = "SELECT * FROM materia";

        $result = mysqli_query($db, $instruccion);
        $db->close();

        $active = $row['active'];
        $count = mysqli_num_rows($result);

        while($row = mysqli_fetch_array($result)) {
            $activeClave = $row['clave'];
            echo
                "<tr>
                <td>".$row['clave']."</td>
                <td>".$row['nombre']."</td>
                <td>".$row['hrsLab']."</td>
                <td><button id='$activeClave' onclick='ajax_borrar(this)'>Borrar </button></td>
            </tr>";
        }
        ?>
    </table><br>
</div>

</body>
</html>
