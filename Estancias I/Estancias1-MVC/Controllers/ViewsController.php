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
    $resultado = $this->publiModel->getPublicaciones();
    if (!empty($_SESSION['id_usuario'])) {
      $id = $_SESSION['id_usuario'];
      $user = $this->userModel->getUserById($id);
      $usuario = $user[1];
      $apellido = $user[2];
      $dep = $user[7];
    }
    if(!empty($_SESSION['rol'])) {
      require_once("Views/Admin/index.php");
    }else {
      require_once("Views/index.php");
    }
  }

  public function departamentos($DepId){
    $resultado = $this->publiModel->getPublicacionesByDepId($DepId);
    $departamento = $this->depModel->getDepById($DepId);
    if (!empty($_SESSION['id_usuario'])) {
      $id = $_SESSION['id_usuario'];
      $user = $this->userModel->getUserById($id);
      $usuario = $user[1];
      $apellido = $user[2];
      $dep = $user[4];
    }
    if(!empty($_SESSION['rol'])) {
      require_once("Views/Admin/index.php");
    }else {
      require_once("Views/index.php");
    }
  }
  
  public function propias(){
    if (!empty($_SESSION['id_usuario'])) {
      $id = $_SESSION['id_usuario'];
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
      require_once("Views/Admin/index.php");
    }
  }
}
?>