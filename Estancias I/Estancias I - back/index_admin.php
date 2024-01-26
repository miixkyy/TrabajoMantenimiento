<?php
session_start();
require("conexion.php");
$db = new Database();

$rol = $_SESSION['rol'];

$idUsuario = $_SESSION['id_usuario'];

if($idUsuario == true)
{
    $sql = $db->conectar()->prepare('SELECT * FROM usuarios WHERE id = :id');
    $sql->execute(['id' => $idUsuario]);
    $row = $sql->fetch(PDO::FETCH_NUM);
    if($row == true)
    {   
        $usuario = $row[1];
        $apellido = $row[2];
        $dep = $row[4];
    }
    else{
        echo "<script>alert('usuario no encontrado')</script>";
    }
}

if ($rol == 1) {
    header("location: index_publicador.php");
}
elseif($rol !=2 )
{
  header("location: index.php");
}

if(isset($_POST['cerrar']))
{
    session_destroy();
    header("location: index.php");
}


$con = $db->conectar();
$sql=  $con->prepare(
    "SELECT p.*, d.departamento
    FROM publicaciones AS p
    JOIN departamentos AS d ON p.id_departamento = d.id 
    ORDER BY p.id DESC;");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_modales.css">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<body>
<div class="header">
    <input type="checkbox" name="" id="toggler" onchange="miFuncion()">
    <label for="toggler" class="fas fa-bars"></label>

    <div class="titulo">
        <h1>Novedades</h1>
    </div>
    
    <div class="iconos">
        <div class="dropdownUser">
            <div class="icon">
                <a class="fas fa-user dropbtn"></a>
            </div>
            <div class="dropdownUser_content">
                <div class="icon">
                    <a  class="fas fa-user"></a>
                </div>
                <div class="usuario">
                    <h1><?php echo $usuario?> <?php echo $apellido?></h1>
                    <p><?php echo $dep?></p>
                    <form method="POST" action="conexion_sesion.php">
                        <input type="submit" name="cerrar" value="Cerrar Sesion"></input>
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="nav" id="lateral">
    <div class="heading">
        <img src="imagenes/image 1.png" alt="">
        <h3>CBTis 130</h3>
    </div>
    <div class="departamentos">
        <li class="poin"></i> <a class="fas fa-home"></a> Novedades</li>
        <a href="propias.php"><li><i class="far fa-user"></i></i> Mis publicaciones</li></a>
        <li><i class="far fa-circle"></i></i> Departamento 1</li>
        <li><i class="far fa-circle"></i></i> Departamento 2</li>
        <li><i class="far fa-circle"></i></i> Departamento 3</li>
        <li class="agregar" id="modal_btn_form"><i class="far fa-user"><input type="text" placeholder="Agregar publicacion"></i></li>
    </div>
</div>

<div class="cont">
<?php foreach($resultado as $row)
  { 
    $id = $row['id'];
    $titular = $row['titular']; 
    $fecha = $row['fecha'];   
    $descripcion = $row['descripcion'];  
    $cuerpo = $row['cuerpo'];
    $imagen1 = $row['imagen1'];
    $imagen2 = $row['imagen2'];
    $imagen3 = $row['imagen3']; 
    $id_departamento = $row['id_departamento']; 
    $departamento = $row['departamento']; 
  ?>
    <div class="publicacion">
        <div class="heading">
            <div class="titulos">
                <div>
                    <h1><?php echo $titular?></h1>
                    <p> <a href="departamento.php?id=<?php echo $id_departamento?>" style="color: #1a1a1a"><span id="underline"><?php echo $departamento?></span> </a> <span><?php echo $fecha?></span></p>
                </div>
                
                <div>
                    <div class="dropdown">
                        <a class="fas fa-ellipsis-v dropbtn"></a>
                        <div class="dropdown-content">
                            <a id="modal_btn_edit" class="borde"><i class="fas fa-edit"></i> Editar</a>
                            <a href="conexion_eliminar.php?id=<?php echo $id ?>&id1=<?php echo $id1 ?>" ><i class="fas fa-trash"></i> Eliminar</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="descripcion">
            <p id="modal_btn_vis" class="openBtn" onclick="visualizar(<?php echo $id ?>)" data-id="<?php echo $id ?>"><?php echo $descripcion?> </p>
        </div>

        <?php if(empty($imagen3) and $imagen2==true){ ?>
        <div class="imagenes">
            <a id="openModal">
                <img src="<?php echo $imagen1?>" onclick="cargarImagenEnModal('<?php echo $imagen1?>')">
            </a>
            <img src="<?php echo $imagen2?>" onclick="cargarImagenEnModal('<?php echo $imagen2?>')">
        </div>

        <?php } elseif(empty($imagen2) and empty($imagen3)){ ?>
        <div class="imagenes">
            <a id="openModal">
                <img src="<?php echo $imagen1?>" onclick="cargarImagenEnModal('<?php echo $imagen1?>')">
            </a>
        </div>

        <?php } else{ ?>
        <div class="imagenes">
            <a id="openModal">
                <img src="<?php echo $imagen1?>" onclick="cargarImagenEnModal('<?php echo $imagen1?>')">
            </a>
            <img src="<?php echo $imagen2?>" onclick="cargarImagenEnModal('<?php echo $imagen2?>')">
            <img src="<?php echo $imagen3?>" onclick="cargarImagenEnModal('<?php echo $imagen3?>')">
        </div>
        <?php } ?>
    </div>
<?php } 
    
    include("modales.php"); 
?>
</div>
    
</body>
<script src="js/script-imagen.js"></script>
</html>