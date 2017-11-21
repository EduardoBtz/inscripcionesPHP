<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cursos</title>
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
    <h2>Lista de cursos</h2>
    <table>
        <tr>
            <th>Clave materia</th>
            <th>Num grupo</th>
            <th>Horario</th>
            <th>Horario lab</th>
            <th>Salon</th>
            <th>Curso en ingles?</th>
            <th>Curso honors?</th>
        </tr>
        <?php

        $db = new mysqli('localhost:8889', 'root', 'root', 'babel');
        $instruccion = "SELECT * FROM cursos";

        $result = mysqli_query($db, $instruccion);
        $db->close();

        $active = $row['active'];
        $count = mysqli_num_rows($result);

        while($row = mysqli_fetch_array($result)) {
            echo
                "<tr>
                <td>".$row['claveMateria']."</td>
                <td>".$row['numGrupo']."</td>
                <td>".$row['horario']."</td>
                <td>".$row['horarioLab']."</td>
                <td>".$row['Salon']."</td>
                <td>".$row['isInEnglish']."</td>
                <td>".$row['isHonors']."</td>
            </tr>";
        }
        ?>
    </table><br>
</div>

</body>
</html>
