<?php
session_start();
include("conexion.php");

if(isset($_SESSION['rol']))
{  
  $roli = $_SESSION['rol'];
  echo "<script>alert('no $roli') </script>";
  switch($_SESSION['rol'])
  {
    case 1:
      header("location: index.php");
    break;
    case 2:
      header("location: index_admin.php");
    break;
  }
}
if(isset($_POST['submit']))
{
  $usuario=$_POST['txtusuario'];
  $apellido=$_POST['txtapellido'];
  $contra=$_POST['txtcontraseña'];

  $db = new Database();
  $sql = $db->conectar()->prepare('SELECT * FROM usuarios WHERE nombre_usuario = :usuario AND apellido_paterno_usuario = :apellido AND contraseña_usuario = :contra');
  $sql->execute(['usuario' => $usuario, 'apellido' => $apellido,'contra' => $contra]);
  $row = $sql->fetch(PDO::FETCH_NUM);
  if(!isset($_SESSION['nombre_usuario']))
  {
    $_SESSION['nombre_usuario'] = $usuario;
    $_SESSION['apellido_usuario'] = $apellido;
    if($row == true)
    {
      $id = $row[0];
      $rol = $row[6];
      $_SESSION['id_usuario'] = $id;
      $_SESSION['rol']=$rol; 
      switch($_SESSION['rol'])
      {
        case 1:
          header("location: index_publicador.php");
        break;
        case 2:
          header("location: index_admin.php");
        break;
      }
    }
    else if($row == false)
    {
      echo "<script>alert('usuario no esta');window.location= 'inicio_de_sesion.php' </script>";
      session_destroy();
    }
    else{
        echo "<script>alert('no reina');window.location= 'inicio_de_sesion.php' </script>";
    }
  }
}
else{
    echo "<script>alert('usuario no existe');window.location= 'inicio_de_sesion.php' </script>";
}

if(isset($_POST['cerrar']))
{
    session_destroy();
    header("location: index.php");
}
?>