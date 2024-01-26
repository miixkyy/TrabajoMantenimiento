<?php
include("conexion.php");
$db = new Database();

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $db->conectar()->prepare('SELECT p.*, d.departamento
    FROM publicaciones AS p
    JOIN departamentos AS d ON p.id_departamento = d.id  WHERE p.id = :id');
    $sql->execute(['id' => $id]);
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        // Crear un nuevo array asociativo con los nombres de las columnas
        $datos = array(
            "id" => $row['id'],
            "titular" => $row['titular'],
            "fecha" => $row ['fecha'],
            "descripcion" => $row['descripcion'],
            "cuerpo" => $row['cuerpo'],
            "imagen1" => $row['imagen1'],
            "imagen2" => $row['imagen2'],
            "imagen3" => $row['imagen3'],
            "departamento" => $row['departamento'],
            "id_departamento" => $row['id_departamento'] 


        );
        // Convertir los datos en un arreglo JSON y enviarlos como respuesta
        echo json_encode($datos);
    } else {
        echo json_encode(null); // Si no se encuentra el registro, devolver null
        echo "<script>alert('$row')</script>";
    }
} else {
    echo json_encode(null); // Si no se proporcionó el ID, devolver null
    echo "<script>alert('nope')</script>";
}
?>
