<?php
require_once 'Models/PublicacionModel.php';
require_once 'Models/UserModel.php';
require_once 'Models/DepartamentoModel.php';

class ViewsController
{
  private $publiModel;
  private $userModel;
  private $depModel;
    
  public function __construct($pdo)
  {
    $this->publiModel = new PublicacionModel($pdo);
    $this->userModel = new UserModel($pdo);
    $this->depModel = new DepartamentoModel($pdo);
  }

  public function index(){
    $ultima = $this->publiModel->getLastPublicacion();
    $resultado = $this->publiModel->getLast6Publicaciones();
    $control = $this->publiModel->getPublicacionesByDepIdLimit6(1);
    $practicas = $this->publiModel->getPublicacionesByDepIdLimit6(2);
    $servicio = $this->publiModel->getPublicacionesByDepIdLimit6(3);
    $direccion = $this->publiModel->getPublicacionesByDepIdLimit6(4);
    $promocion = $this->publiModel->getPublicacionesByDepIdLimit6(5);
    $prefectura = $this->publiModel->getPublicacionesByDepIdLimit6(6);
    $orientacion = $this->publiModel->getPublicacionesByDepIdLimit6(7);
    $coordinacion = $this->publiModel->getPublicacionesByDepIdLimit6(8);
    if (!empty($_SESSION['id_usuario'])) {
      $id = $_SESSION['id_usuario'];
      $user = $this->userModel->getUserById($id);
      $usuario = $user[1];
      $apellido = $user[2];
      $dep = $user[7];
    }
    require_once("Views/index.php");
  }

  public function departamentos($DepId){
    $registros_por_pagina = 30;
    if (isset($_GET['page'])) {
      $pagina_actual = $_GET['page'];
    }else{
      $pagina_actual = 1;
    }
   

    // Calcular el número total de registros (debes obtenerlo de tu base de datos)
    $total_registros = $this->publiModel->getLong($DepId);

    // Calcular el número total de páginas
    $total_paginas = ceil($total_registros / $registros_por_pagina);

    // Calcular los límites de la consulta SQL
    $inicio = ($pagina_actual - 1) * $registros_por_pagina;

    // Realizar la consulta SQL
    $resultado = $this->publiModel->getPublicacionesByDepId($DepId, $inicio, $registros_por_pagina);


    $ultima = $this->publiModel->getLastPublicacionByDepId($DepId);
    $departamento = $this->depModel->getDepById($DepId);
    if (!empty($_SESSION['id_usuario'])) {
      $id = $_SESSION['id_usuario'];
      $user = $this->userModel->getUserById($id);
      $usuario = $user[1];
      $apellido = $user[2];
      $dep = $user[4];
    }
    require_once("Views/index.php");
    /*
    $ultima = $this->publiModel->getLastPublicacionByDepId($DepId);
    $resultado = $this->publiModel->getPublicacionesByDepId($DepId);
    $departamento = $this->depModel->getDepById($DepId);
    if (!empty($_SESSION['id_usuario'])) {
      $id = $_SESSION['id_usuario'];
      $user = $this->userModel->getUserById($id);
      $usuario = $user[1];
      $apellido = $user[2];
      $dep = $user[4];
    }
    */
  }
  
  public function propias(){
    if (!empty($_SESSION['id_usuario'])) {
      $id = $_SESSION['id_usuario'];
      $ultima = $this->publiModel->getLastPublicacionByUserId($id);
      $resultado = $this->publiModel->getPublicacionesByUserId($id);
      if (empty($resultado)) {
        $mensaje = "No hay publicaciones propias aún.";
        $botonTexto = "Realizar primera publicación";
        $botonURL = "index.php";
      }
      $user = $this->userModel->getUserById($id);
      $usuario = $user[1];
      $apellido = $user[2];
      $dep = $user[4];
      require_once("Views/index.php");
    }
  }

  public function publicacion($id){
    $publi = $this->publiModel->getPublicacionById($id);
    $ultima = $this->publiModel->getLastPublicacionExept($id);
    $ultimas4 = $this->publiModel->getLast4Publicaciones($id);
    if (!empty($_SESSION['id_usuario'])) {
      $id = $_SESSION['id_usuario'];
      $user = $this->userModel->getUserById($id);
      $usuario = $user[1];
      $apellido = $user[2];
      $dep = $user[4];
    }
    require_once("Views/publicacion.php");
  }
}
?>