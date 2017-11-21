<!DOCTYPE html>
<html lang="en">
<head>
    <title>Salones</title>
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
    <h2>Lista de salones</h2>
    <table>
        <tr>
            <th>Num salon</th>
            <th>Capacidad</th>
            <th>Departamento</th>
        </tr>
        <?php

        $db = new mysqli('localhost:8889', 'root', 'root', 'babel');
        $instruccion = "SELECT * FROM salones";

        $result = mysqli_query($db, $instruccion);
        $db->close();

        $active = $row['active'];
        $count = mysqli_num_rows($result);

        while($row = mysqli_fetch_array($result)) {
            echo
                "<tr>
                <td>".$row['numSalon']."</td>
                <td>".$row['capacidad']."</td>
                <td>".$row['departamento']."</td>
            </tr>";
        }
        ?>
    </table><br>
</div>

</body>
</html>
