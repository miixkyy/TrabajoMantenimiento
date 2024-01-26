<!DOCTYPE html>
<html lang="en">
<?php
include("Views/Layouts/head.php");
?>
<body>
<div class="header">
    <input type="checkbox" name="" id="toggler" onchange="miFuncion()">
    <label for="toggler" class="fas fa-bars"></label>
    <?php if(isset($_GET['p']) and isset($_GET['id'])){ ?>
    <div class="titulo">
        <h1><?php echo $departamento[0] ?></h1>
    </div>
    <?php } else {?>
       <div class="titulo">
        <h1>Novedades</h1>
        </div>  
    <?php } ?>

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
                    <form method="POST" action="index.php?m=logout">
                        <input type="submit" name="cerrar" value="Cerrar Sesion"></input>
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="nav" id="lateral">
    <div class="heading">
        <img src="Public/imagenes/image 1.png" alt="">
        <h3>CBTis 130</h3>
    </div>
    <div class="departamentos">
        <a href="index.php"><li><i class="fas fa-home"></i></i> Novedades</li></a>
        <a href="index.php?p=propias"><li><i class="far fa-user"></i></i> Mis publicaciones</li></a>
        <a href="index.php?p=departamentos&id=1"><li><i class="far fa-circle"></i></i> Control Escolar</li></a>
        <a href="index.php?p=departamentos&id=2"><li><i class="far fa-circle"></i></i> Prácticas Profesionales</li></a>
        <a href="index.php?p=departamentos&id=3"><li><i class="far fa-circle"></i></i> Servicio Social</li></a>
        <a href="index.php?p=departamentos&id=4"><li><i class="far fa-circle"></i></i> Dirección</li></a>
        <a href="index.php?p=departamentos&id=5"><li><i class="far fa-circle"></i></i> Promocion Cultural y Deportiva</li></a>
        <a href="index.php?p=departamentos&id=6"><li><i class="far fa-circle"></i></i> Prefectura</li></a>
        <a href="index.php?p=departamentos&id=7"><li><i class="far fa-circle"></i></i> Orientación Educativa</li></a>
        <a href="index.php?p=departamentos&id=8"><li><i class="far fa-circle"></i></i> Cordinacion de Carreras</li></a>
        <li class="agregar" id="modal_btn_form" onclick="agregar()"><i class="far fa-user"><input type="text" placeholder="Agregar publicacion"></i></li>
    </div>
</div>

<div class="cont">
<?php if (empty($resultado)) : ?>
    <div style="text-align: center;">
        <p style="font-size: 20px; font-weight: bold;">Esta pagina se encuentra vacia.</p>
        <a href="index.php" class="boton">Ir a Novedades</a>
    </div>
<?php endif;
foreach($resultado as $row)
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
                    <p> <a href="index.php?p=departamentos&id=<?php echo $id_departamento?>" style="color: #1a1a1a"><span id="underline"><?php echo $departamento?></span> </a> <span><?php echo $fecha?></span></p>
                </div>
                
            <?php if(!empty($_SESSION['rol']) and $_SESSION['rol']==2){ ?>
                <div>
                    <div class="dropdown">
                        <a class="fas fa-ellipsis-v dropbtn"></a>
                        <div class="dropdown-content">
                            <a id="modal_btn_edit" class="borde"  onclick="editar(<?php echo $id ?>)"><i class="fas fa-edit"></i> Editar</a>
                            <a href="index.php?id=<?php echo $id ?>&c=eliminar" ><i class="fas fa-trash"></i> Eliminar</a>
                        </div>
                    </div>
                </div>
            <?php }elseif (isset($_GET['p']) and $_GET['p']=='propias') {?>
                <div>
                    <div class="dropdown">
                        <a class="fas fa-ellipsis-v dropbtn"></a>
                        <div class="dropdown-content">
                            <a id="modal_btn_edit" class="borde"  onclick="editar(<?php echo $id ?>)"><i class="fas fa-edit"></i> Editar</a>
                            <a href="index.php?id=<?php echo $id ?>&c=eliminar" ><i class="fas fa-trash"></i> Eliminar</a>
                        </div>
                    </div>
                </div>
            <?php } ?> 
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
    
    include("Views/modales.php"); 
?>
</div>
    
</body>
<script src="Public/js/main.js"></script>
<script>
    var mediaQuery = window.matchMedia("(max-width: 900px)");

    mediaQuery.addListener(function(mediaQuery) {
    var lat = document.getElementById("lateral");
    if (mediaQuery.matches) {
        // La regla @media se cumple, realiza alguna acción
        lat.style.display = "none"
    } else {
        // La regla @media no se cumple, realiza alguna otra acción
        lat.style.display = "block"
    }
    });
</script>
</html>