<?php 
include("conexion.php");

if(isset($_GET["id"]))
{
  $id1 = $_GET["id"];
  $consulta = "DELETE from publicaciones WHERE id=$id1";
  $conex->query($consulta);
  $id = $_GET["id1"];
  header("location: index_admin.php?id=$id");
}


exit;
?>