<?php

class UserModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserByUsername($usuario, $apellido)
    {
        $query = 'SELECT u.*, d.departamento
        FROM usuarios AS u
        JOIN departamentos AS d ON u.id_departamento = d.id  
        WHERE u.nombre_usuario = :usuario AND u.apellido_paterno_usuario = :apellido';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['usuario' => $usuario, 'apellido' => $apellido]);
        return $stmt->fetch(PDO::FETCH_NUM);
    }

    public function getUserById($id){
        $query = 'SELECT u.*, d.departamento
        FROM usuarios AS u
        JOIN departamentos AS d ON u.id_departamento = d.id 
        WHERE u.id = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_NUM);
    }
}
