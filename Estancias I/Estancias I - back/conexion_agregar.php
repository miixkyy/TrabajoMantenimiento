<?php
include("conexion.php");

if(isset($_POST['agregar']))
{
  $titular=$_POST['titular'];
  $fecha = date('d/m/Y');
  $descripcion=$_POST['descripcion'];
  $cuerpo=$_POST['cuerpo'];

  $nombreimg1=$_FILES['imagen1']['name'];//contiene el nombre
  $archivo1=$_FILES['imagen1']['tmp_name'];//contiene el archivo

  $nombreimg2=$_FILES['imagen2']['name'];//contiene el nombre
  $archivo2=$_FILES['imagen2']['tmp_name'];//contiene el archivo

  $nombreimg3=$_FILES['imagen3']['name'];//contiene el nombre
  $archivo3=$_FILES['imagen3']['tmp_name'];//contiene el archivo

  
  $ruta0="imagenes";
  
  //imagen1
  $ruta1=$ruta0."/".$nombreimg1;//images/nombre.jpg
  move_uploaded_file($archivo1,$ruta1);

  //imagen2
  $ruta2=$ruta0."/".$nombreimg2;//images/nombre.jpg
  move_uploaded_file($archivo2,$ruta2);

  //imagen3
  $ruta3=$ruta0."/".$nombreimg3;//images/nombre.jpg
  move_uploaded_file($archivo3,$ruta3);

  
  if (empty($nombreimg2) and empty($nombreimg3)) {
    $consulta = "INSERT INTO publicaciones(titular, fecha, descripcion, cuerpo, imagen1) VALUES ('$titular','$fecha','$descripcion','$cuerpo','$ruta1')";
  } elseif (empty($nombreimg3) and !empty($nombreimg2)) {
    $consulta = "INSERT INTO publicaciones(titular, fecha, descripcion, cuerpo, imagen1, imagen2) VALUES ('$titular','$fecha','$descripcion','$cuerpo','$ruta1','$ruta2')";
  } else {
    $consulta = "INSERT INTO publicaciones(titular, fecha, descripcion, cuerpo, imagen1, imagen2, imagen3) VALUES ('$titular','$fecha','$descripcion','$cuerpo','$ruta1','$ruta2','$ruta3')";
  }
  
  echo"$fecha";

  $query=mysqli_query($conex,$consulta);

  if($query)
  {
    $id1 = $_GET["id"];
    echo"eso patronaaaaa";
    header("location: index_admin.php?id=$id1");
     
  }
  else
  {
    echo"pues no mi programadora";
  }
}


?>