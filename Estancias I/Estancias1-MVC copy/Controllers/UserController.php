<?php

require_once 'Models/UserModel.php';

class UserController
{
  private $userModel;
  
  public function __construct($pdo)
  {
      $this->userModel = new UserModel($pdo);
  }  
  public function login()
  {
    if (isset($_POST['submit'])) {
      session_start();
      $usuario=$_POST['txtusuario'];
      $apellido=$_POST['txtapellido'];
      $contra=$_POST['txtcontraseña'];

      $user = $this->userModel->getUserByUsername($usuario, $apellido);

      if ($user && $contra === $user['4']) {
        $_SESSION['id_usuario'] = $user[0];
        $_SESSION['rol']=$user[5]; 
        $_SESSION['id_dep']=$user[6]; 

        header('Location: index.php');
        exit;
      } else {
        header('Location: index.php?message=UsuarioInvalido');
        exit;
        }
    } else {
      require "Views/login.php";
    }
  }

  public function logout(){
    session_destroy();
    header("Location: index.php");
  }
}
