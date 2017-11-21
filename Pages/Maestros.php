<!DOCTYPE html>
<html lang="en">
<head>
    <title>Maestros</title>
    <meta charset="UTF-8">
    <link href="NavigationStyle.css" type="text/css" rel="stylesheet">
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
    <table>
        <tr>
            <th>Nomina</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>#Cursos</th>
            <th>Email</th>
        </tr>
        <?php

        $db = new mysqli('localhost:3306', 'root', 'root123', 'inscripciones');
        $instruccion = "SELECT nomina, nombre, telefono, email, cant_cursos FROM maestros";

        $result = mysqli_query($db, $instruccion);
        $db->close();

        $active = $row['active'];
        $count = mysqli_num_rows($result);

        while($row = mysqli_fetch_array($result)) {
            echo
                "<tr>
                <td>".$row['nomina']."</td>
                <td>".$row['nombre']."</td>
                <td>".$row['telefono']."</td>
                <td>".$row['email']."</td>
                <td>".$row['cant_cursos']."</td>
            </tr>";
        }
        ?>
    </table><br>
</div>

</body>
</html>
