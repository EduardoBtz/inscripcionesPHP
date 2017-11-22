<?php

$hacer = $_POST['hacer'];

if($hacer == "actualizar") {
    $id = (int)$_POST['id'];
    $campo = $_POST['campo'];
    $valor = $_POST['valor'];

    $db = new mysqli('localhost:8889', 'root', 'root', 'usuario');
    $sql = "UPDATE registrados SET $campo = '$valor' WHERE id=$id";
    $result = mysqli_query($db, $sql);

    $db->close();
} else if ($hacer == "borrarFila"){
    $idS = $_POST['id'];

    $db = new mysqli('localhost:3306', 'root', 'root123', 'inscripciones');
    $sql = "DELETE FROM maestros WHERE nomina='$idS'";
    $result = mysqli_query($db, $sql);
    $db->close();
} else if ($hacer == "agrega") {

    $db = new mysqli('localhost:3306', 'root', 'root123', 'inscripciones');
    $id = $_POST['id'];
    $nomina = "nomina";
    $nombre = "nombre";
    $telefono = "telefono";
    $noCursos = int("0");
    $email = "email";



    $sql = "INSERT INTO maestros (nomina, nombre, telefono, email, cant_cursos, responsabilidad) VALUES ('$nomina', '$nombre', '$telefono', '$noCursos', '$email', NULL);";
    $result = mysqli_query($db, $sql);
    $db->close();
}
else {
    echo "no hice match";
}

?>
