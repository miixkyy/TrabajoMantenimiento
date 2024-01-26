<?php

class PublicacionModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function getPublicaciones()
    {
        $query = "SELECT p.*, d.departamento
        FROM publicaciones AS p
        JOIN departamentos AS d ON p.id_departamento = d.id 
        ORDER BY p.id DESC;";
        $resultado = $this->pdo->prepare($query);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);;
    }
    public function getPublicacionesByDepId($DepId)
    {
        $query = "SELECT p.*, d.departamento
        FROM publicaciones AS p
        JOIN departamentos AS d ON p.id_departamento = d.id 
        WHERE p.id_departamento = $DepId
        ORDER BY p.id DESC;";
        $resultado = $this->pdo->prepare($query);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);;
    }
    public function getPublicacionById($id)
    {
        $query = "SELECT p.*, d.departamento
        FROM publicaciones AS p
        JOIN departamentos AS d ON p.id_departamento = d.id 
        WHERE p.id = :id";
        $resultado = $this->pdo->prepare($query);
        $resultado->execute(['id' => $id]);
        return $resultado->fetch(PDO::FETCH_ASSOC);;
    }
    public function getPublicacionesByUserId($id)
    {
        $query = "SELECT p.*, d.departamento
        FROM publicaciones AS p
        JOIN departamentos AS d ON p.id_departamento = d.id 
        WHERE p.id_usuario = $id
        ORDER BY p.id DESC;";
        $resultado = $this->pdo->prepare($query);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);;
    }

    public function eliminarPublicacion($id) {
        try {
            $id = $this->pdo->quote($id);
            $consulta = "DELETE FROM publicaciones WHERE id=$id";
            $resultado = $this->pdo->exec($consulta);

            if ($resultado === false) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function agregarPublicacion($titular, $fecha, $descripcion, $cuerpo, $ruta1, $ruta2, $ruta3, $userId, $dep) {
        try {
            if (empty($ruta2) && empty($ruta3)) {
                $consulta = "INSERT INTO publicaciones(titular, fecha, descripcion, cuerpo, imagen1, id_usuario, id_departamento) VALUES ('$titular','$fecha','$descripcion','$cuerpo','$ruta1',$userId,$dep)";
            } elseif (empty($ruta3) && !empty($ruta2)) {
                $consulta = "INSERT INTO publicaciones(titular, fecha, descripcion, cuerpo, imagen1, imagen2, id_usuario, id_departamento) VALUES ('$titular','$fecha','$descripcion','$cuerpo','$ruta1','$ruta2',$userId,$dep)";
            } else {
                $consulta = "INSERT INTO publicaciones(titular, fecha, descripcion, cuerpo, imagen1, imagen2, imagen3, id_usuario, id_departamento) VALUES ('$titular','$fecha','$descripcion','$cuerpo','$ruta1','$ruta2','$ruta3',$userId,$dep)";
            }

            $resultado = $this->pdo->prepare($consulta);

            return $resultado->execute();

        } catch (PDOException $e) {
            return false;
        }
    }

}