<div class="header">
    <div class="logo">
        <input type="checkbox" name="" id="toggler" onchange="miFuncion()">
        <label for="toggler" class="fas fa-bars" id="icon"></label>
        <label for="toggler" id="navlat">Departamentos</label>
        
    </div>
    <a href="index.php" class="titulo">
        <img src="Public/imagenes/logo.png">
        <h1>CBTis 130</h1>  
    </a>
    
    <div class="iconos">
        <?php if(!empty($_SESSION['id_usuario'])){ ?>
            <div class="dropdownUser">
                <div class="icon">
                    <a class="fas fa-user"></a>
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
        <?php } else {?>  
            <div class="icon">
                <a class="fas fa-user dropbtn" href="index.php?m=login"></a>
            </div>
        <?php } ?>      
    </div>
</div>

<div class="nav" id="lateral">
    <scroll-container id="navlateral">
    <scroll-page>
        <div class="departamentos">
            <a href="index.php"><li><i class="fas fa-home"></i></i> Novedades</li></a>
            <?php if(!empty($_SESSION['id_usuario'])){ ?>
                <a href="index.php?p=propias"><li><i class="far fa-user"></i></i> Mis publicaciones</li></a>
            <?php } ?>  
            <a href="index.php?p=departamentos&id=1"><li><i class="far fa-circle"></i></i> Control Escolar</li></a>
            <a href="index.php?p=departamentos&id=2"><li><i class="far fa-circle"></i></i> Prácticas Profesionales</li></a>
            <a href="index.php?p=departamentos&id=3"><li><i class="far fa-circle"></i></i> Servicio Social</li></a>
            <a href="index.php?p=departamentos&id=4"><li><i class="far fa-circle"></i></i> Dirección</li></a>
            <a href="index.php?p=departamentos&id=5"><li><i class="far fa-circle"></i></i> Promocion Cultural y Deportiva</li></a>
            <a href="index.php?p=departamentos&id=6"><li><i class="far fa-circle"></i></i> Prefectura</li></a>
            <a href="index.php?p=departamentos&id=7"><li><i class="far fa-circle"></i></i> Orientación Educativa</li></a>
            <a href="index.php?p=departamentos&id=8"><li><i class="far fa-circle"></i></i> Coordinacion de Carreras</li></a>
            <?php if(!empty($_SESSION['id_usuario'])){ ?>
                <li class="agregar" id="modal_btn_form" onclick="agregar()"><i class="far fa-user"><input type="text" placeholder="Agregar publicacion"></i></li>
            <?php } ?>  
            
        </div>
    </scroll-page>
    </scroll-container>

</div>
