<?php

class DepartamentoModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getDepById($id)
    {
        $query = 'SELECT departamento FROM departamentos WHERE id = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_NUM);
    }
}
