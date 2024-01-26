<!DOCTYPE html>
<html lang="en">
<?php
include("Views/Layouts/head.php");
?>
<body>
<?php include("Views/Layouts/navbars.php"); ?> 

<div class="cont">
    <div class="encabezado">
        <?php if(isset($_GET['p']) and isset($_GET['id'])){ ?>
            <h1><?php echo $departamento[0] ?></h1>
        <?php } else {?>
            <h1>Ultimas Publicaciones</h1>  
        <?php } ?>
    </div>

    <div class="principal">
        <div class="publicacion">
        <?php if(!empty($_SESSION['rol']) and $_SESSION['rol']==2){ ?>
                <div>
                    <div class="dropdown">
                        <a class="fas fa-ellipsis-v dropbtn"></a>
                        <div class="dropdown-content">
                            <a id="modal_btn_edit" class="borde"  onclick="editar(<?php echo $ultima['id'] ?>)"><i class="fas fa-edit"></i> Editar</a>
                            <a href="index.php?id=<?php echo $ultima['id'] ?>&c=eliminar" ><i class="fas fa-trash"></i> Eliminar</a>
                        </div>
                    </div>
                </div>
            <?php }elseif (isset($_GET['p']) and $_GET['p']=='propias') {?>
                <div>
                    <div class="dropdown">
                        <a class="fas fa-ellipsis-v dropbtn"></a>
                        <div class="dropdown-content">
                            <a id="modal_btn_edit" class="borde"  onclick="editar(<?php echo $ultima['id'] ?>)"><i class="fas fa-edit"></i> Editar</a>
                            <a href="index.php?id=<?php echo $ultima['id'] ?>&c=eliminar" ><i class="fas fa-trash"></i> Eliminar</a>
                        </div>
                    </div>
                </div>
            <?php } ?> 
            <div class="imagen">
                <a href="index.php?p=publicacion&id=<?php echo $ultima['id']?>"><img src="<?php echo $ultima['imagen1']?>"></a>
            </div>
            <div class="departamento">
                <a href="index.php?p=departamentos&id=<?php echo $ultima['id_departamento']?>"><p> <span id="underline"><?php echo $ultima['departamento']?></span></p></a>
            </div>
            <div class="titular">
                <a href="index.php?p=publicacion&id=<?php echo $ultima['id']?>"><h1><?php echo $ultima['titular']?></h1></a>
            </div>
            <div class="descripcion">
                <p><?php echo $ultima['cuerpo']?>.</p>
            </div>
        </div>
    </div>

    <div class="secciones">
        <div class="titulo">
            <h1>Novedades</h1>
            <div class="linea-horizontal">
                <div></div>
            </div>
        </div>
        <div class="publicaciones">
            <?php foreach($resultado as $row){  
                include("Views/layouts/publicaciones.php");
            }?>    
        </div>
    </div>
    <?php

    if (isset($_GET['p']) and $_GET['p'] == 'departamentos' and $total_paginas!=1) {?>
    if
        <div class="botones">
            <div>
        <?php
        for ($i = 1; $i <= $total_paginas; $i++) {
            echo "<a class='btns' href='index.php?p=departamentos&id=$_GET[id]&page=$i'>$i</a> ";
        }?> 
        </div>
        </div>
    <?php
    }
    ?>  
    
<?php if(!isset($_GET['p']) and !isset($_GET['id'])){ ?>
    <div class="secciones">
        <div class="titulo">
            <h1>Control Escolar</h1>
            <div class="linea-horizontal">
                <div></div>
            </div>
        </div>
        <div class="publicaciones">
            <?php foreach($control as $row){ 
                include("Views/layouts/publicaciones.php");
            }?>    
        </div>
    </div>
    
    <div class="secciones">
        <div class="titulo">
            <h1>Prácticas Profesionales</h1>
            <div class="linea-horizontal">
                <div></div>
            </div>
        </div>
        <div class="publicaciones">
            <?php foreach($practicas as $row){ 
                include("Views/layouts/publicaciones.php");
            }?>    
        </div>
    </div>
    
    <div class="secciones">
        <div class="titulo">
            <h1>Servicio Social</h1>
            <div class="linea-horizontal">
                <div></div>
            </div>
        </div>
        <div class="publicaciones">
            <?php foreach($servicio as $row){ 
                include("Views/layouts/publicaciones.php");
            }?>    
        </div>
    </div>

    <div class="secciones">
        <div class="titulo">
            <h1>Dirección</h1>
            <div class="linea-horizontal">
                <div></div>
            </div>
        </div>
        <div class="publicaciones">
        <?php foreach($direccion as $row){  
                include("Views/layouts/publicaciones.php");
            }?>    
        </div>
    </div>

    <div class="secciones">
        <div class="titulo">
            <h1>Promocion Cultural y Deportiva</h1>
            <div class="linea-horizontal">
                <div></div>
            </div>
        </div>
        <div class="publicaciones">
            <?php foreach($promocion as $row){
                include("Views/layouts/publicaciones.php");
            } ?>    
        </div>
    </div>

    <div class="secciones">
        <div class="titulo">
            <h1>Prefectura</h1>
            <div class="linea-horizontal">
                <div></div>
            </div>
        </div>
        <div class="publicaciones">
            <?php foreach($prefectura as $row){
                include("Views/layouts/publicaciones.php");
            }?>    
        </div>
    </div>

    <div class="secciones">
        <div class="titulo">
            <h1>Orientación Educativa</h1>
            <div class="linea-horizontal">
                <div></div>
            </div>
        </div>
        <div class="publicaciones">
            <?php foreach($orientacion as $row)
            {
                include("Views/layouts/publicaciones.php");
            }?>    
        </div>
    </div>

    <div class="secciones">
        <div class="titulo">
            <h1>Coordinacion de Carreras</h1>
            <div class="linea-horizontal">
                <div></div>
            </div>
        </div>
        <div class="publicaciones">
            <?php foreach($coordinacion as $row)
            { 
                include("Views/layouts/publicaciones.php");
            } ?>    
        </div>
    </div>

<?php }?>

    

<?php 
    include("Views/modales.php"); 
?>
</div>
    
</body>
<?php include("Views/layouts/scripts.php") ?>  

</html>