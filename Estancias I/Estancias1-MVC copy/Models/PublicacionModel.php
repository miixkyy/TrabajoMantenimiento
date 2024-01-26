<?php

class PublicacionModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    

    public function getLong($DepId)
    {
        $query = "SELECT COUNT(*) AS total_registros FROM publicaciones WHERE id_departamento = $DepId;";
        $resultado = $this->pdo->prepare($query);
        $resultado->execute();
        $registro = $resultado->fetch(PDO::FETCH_ASSOC);

        $total_registros = (int)$registro['total_registros'];
        return $total_registros;
    }

    public function getPublicaciones()
    {
        $query = "SELECT p.*, d.departamento
        FROM publicaciones AS p
        JOIN departamentos AS d ON p.id_departamento = d.id 
        ORDER BY p.id 
        DESC LIMIT 18446744073709551615
        OFFSET 1;";
        $resultado = $this->pdo->prepare($query);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);;
    }
    public function getLast4Publicaciones($id)
    {
        $query = "SELECT p.*, d.departamento
        FROM publicaciones AS p
        JOIN departamentos AS d ON p.id_departamento = d.id 
        WHERE p.id <> $id
        ORDER BY p.id DESC
        LIMIT 4 OFFSET 1;
        ";
        $resultado = $this->pdo->prepare($query);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);;
    }
    public function getLast6Publicaciones()
    {
        $query = "SELECT p.*, d.departamento
        FROM publicaciones AS p
        JOIN departamentos AS d ON p.id_departamento = d.id 
        ORDER BY p.id DESC
        LIMIT 6 OFFSET 1;
        ";
        $resultado = $this->pdo->prepare($query);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);;
    }
    public function getLastPublicacion()
    {
        $query = "SELECT p.*, d.departamento
        FROM publicaciones AS p
        JOIN departamentos AS d ON p.id_departamento = d.id 
        ORDER BY p.id DESC LIMIT 1;";
        
        $resultado = $this->pdo->prepare($query);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);;
    }
    public function getLastPublicacionExept($id)
    {
        $query = "SELECT p.*, d.departamento
        FROM publicaciones AS p
        JOIN departamentos AS d ON p.id_departamento = d.id 
        WHERE p.id <> $id
        ORDER BY p.id DESC LIMIT 1;";
        
        $resultado = $this->pdo->prepare($query);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
    public function getLastPublicacionByDepId($id)
    {
        $query = "SELECT p.*, d.departamento
        FROM publicaciones AS p
        JOIN departamentos AS d ON p.id_departamento = d.id 
        WHERE p.id_departamento = $id
        ORDER BY p.id DESC LIMIT 1;";
        
        $resultado = $this->pdo->prepare($query);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);;
    }
    public function getPublicacionesByDepId($DepId, $inicio, $registros_por_pagina)
    {
        $query = "SELECT p.*, d.departamento
        FROM publicaciones AS p
        JOIN departamentos AS d ON p.id_departamento = d.id 
        WHERE p.id_departamento = $DepId
        AND p.id < (SELECT MAX(id) FROM publicaciones WHERE id_departamento = $DepId)
        ORDER BY p.id
        LIMIT $registros_por_pagina OFFSET $inicio";
        $resultado = $this->pdo->prepare($query);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getPublicacionesByDepIdLimit6($DepId)
    {
        $query = "SELECT p.*, d.departamento
        FROM publicaciones AS p
        JOIN departamentos AS d ON p.id_departamento = d.id 
        LEFT JOIN (
           SELECT id
           FROM publicaciones
           ORDER BY id DESC
           LIMIT 7
        ) AS ultimas_publicaciones ON p.id = ultimas_publicaciones.id
        WHERE p.id_departamento = $DepId AND ultimas_publicaciones.id IS NULL
        ORDER BY p.id DESC
        LIMIT 6;";
        /* */
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
    public function getLastPublicacionByUserId($id)
    {
        $query = "SELECT p.*, d.departamento
        FROM publicaciones AS p
        JOIN departamentos AS d ON p.id_departamento = d.id 
        WHERE p.id_usuario = $id
        ORDER BY p.id 
        DESC LIMIT 1;";
        $resultado = $this->pdo->prepare($query);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);;
    }
    public function getPublicacionesByUserId($id)
    {
        $query = "SELECT p.*, d.departamento
        FROM publicaciones AS p
        JOIN departamentos AS d ON p.id_departamento = d.id 
        WHERE p.id_usuario = $id
        ORDER BY p.id 
        DESC LIMIT 18446744073709551615
        OFFSET 1;";
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

    public function agregarPublicacion($titular, $fecha, $cuerpo, $ruta1, $ruta2, $ruta3, $userId, $dep) {
        try {
            if (empty($ruta2) && empty($ruta3)) {
                $consulta = "INSERT INTO publicaciones(titular, fecha, cuerpo, imagen1, id_usuario, id_departamento) VALUES ('$titular','$fecha','$cuerpo','$ruta1',$userId,$dep)";
            } elseif (empty($ruta3) && !empty($ruta2)) {
                $consulta = "INSERT INTO publicaciones(titular, fecha, cuerpo, imagen1, imagen2, id_usuario, id_departamento) VALUES ('$titular','$fecha','$cuerpo','$ruta1','$ruta2',$userId,$dep)";
            } else {
                $consulta = "INSERT INTO publicaciones(titular, fecha, cuerpo, imagen1, imagen2, imagen3, id_usuario, id_departamento) VALUES ('$titular','$fecha','$cuerpo','$ruta1','$ruta2','$ruta3',$userId,$dep)";
            }

            $resultado = $this->pdo->prepare($consulta);

            return $resultado->execute();

        } catch (PDOException $e) {
            return false;
        }
    }

    public function actualizarPublicacion($id,$titular, $cuerpo, $ruta1, $ruta2, $ruta3, $dep, $numImagenes) {
        try {
            if($dep == 0){
                switch ($numImagenes) {
                    case 1:
                        if (empty($ruta1)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen2=NULL, imagen3=NULL WHERE id=$id";
                        }  else {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen1='$ruta1', imagen2=NULL, imagen3=NULL WHERE id=$id";
                        }
                        break;
                    case 2:
                        if (empty($ruta1) && empty($ruta2)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen3=NULL WHERE id=$id";
                        } elseif (!empty($ruta1) && empty($ruta2)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen1='$ruta1', imagen3=NULL WHERE id=$id";
                        } elseif (empty($ruta1) && !empty($ruta2)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen2='$ruta2', imagen3=NULL WHERE id=$id";
                        } else {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen1='$ruta1', imagen2='$ruta2', imagen3=NULL WHERE id=$id";
                        }
                        break;
                    case 3:
                        if (empty($ruta1) && empty($ruta2) && empty($ruta3)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo' WHERE id=$id";
                        } elseif (!empty($ruta1) && empty($ruta2) && empty($ruta3)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen1='$ruta1' WHERE id=$id";
                        } elseif (empty($ruta1) && !empty($ruta2) && empty($ruta3)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen2='$ruta2' WHERE id=$id";
                        } elseif (empty($ruta1) && empty($ruta2) && !empty($ruta3)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen3='$ruta3' WHERE id=$id";
                        } elseif (!empty($ruta1) && !empty($ruta2) && empty($ruta3)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen1='$ruta1', imagen2='$ruta2' WHERE id=$id";
                        } elseif (!empty($ruta1) && empty($ruta2) && !empty($ruta3)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen1='$ruta1', imagen3='$ruta3' WHERE id=$id";
                        } elseif (empty($ruta1) && !empty($ruta2) && !empty($ruta3)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen2='$ruta2', imagen3='$ruta3' WHERE id=$id";
                        }else {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen1='$ruta1', imagen2='$ruta2', imagen3='$ruta3' WHERE id=$id";
                        }
                        break;
                    default:
                        break;
                }
            } else {
                switch ($numImagenes) {
                    case 1:
                        if (empty($ruta1)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen2=NULL, imagen3=NULL, id_departamento=$dep WHERE id=$id";
                        }  else {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen1='$ruta1', imagen2=NULL, imagen3=NULL, id_departamento=$dep WHERE id=$id";
                        }
                        break;
                    case 2:
                        if (empty($ruta1) && empty($ruta2)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen3=NULL, id_departamento=$dep WHERE id=$id";
                        } elseif (!empty($ruta1) && empty($ruta2)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen1='$ruta1', imagen3=NULL, id_departamento=$dep WHERE id=$id";
                        } elseif (empty($ruta1) && !empty($ruta2)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen2='$ruta2', imagen3=NULL, id_departamento=$dep WHERE id=$id";
                        } else {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen1='$ruta1', imagen2='$ruta2', imagen3=NULL, id_departamento=$dep WHERE id=$id";
                        }
                        break;
                    case 3:
                        if (empty($ruta1) && empty($ruta2) && empty($ruta3)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', id_departamento=$dep WHERE id=$id";
                        } elseif (!empty($ruta1) && empty($ruta2) && empty($ruta3)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen1='$ruta1', id_departamento=$dep WHERE id=$id";
                        } elseif (empty($ruta1) && !empty($ruta2) && empty($ruta3)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen2='$ruta2', id_departamento=$dep WHERE id=$id";
                        } elseif (empty($ruta1) && empty($ruta2) && !empty($ruta3)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen3='$ruta3', id_departamento=$dep WHERE id=$id";
                        } elseif (!empty($ruta1) && !empty($ruta2) && empty($ruta3)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen1='$ruta1', imagen2='$ruta2', id_departamento=$dep WHERE id=$id";
                        } elseif (!empty($ruta1) && empty($ruta2) && !empty($ruta3)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen1='$ruta1', imagen3='$ruta3', id_departamento=$dep WHERE id=$id";
                        } elseif (empty($ruta1) && !empty($ruta2) && !empty($ruta3)) {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen2='$ruta2', imagen3='$ruta3', id_departamento=$dep WHERE id=$id";
                        }else {
                            $consulta = "UPDATE publicaciones SET titular='$titular', cuerpo='$cuerpo', imagen1='$ruta1', imagen2='$ruta2', imagen3='$ruta3', id_departamento=$dep WHERE id=$id";
                        }
                        break;
                    default:
                        break;
                }
            }
            

            $resultado = $this->pdo->prepare($consulta);

            return $resultado->execute();

        } catch (PDOException $e) {
            return false;
        }
    }

}