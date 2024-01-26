<!DOCTYPE html>
<html lang="en">
<?php include("Views/Layouts/head.php"); ?> 
<body>
<?php include("Views/Layouts/navbars.php"); ?> 
<?php include("Views/modales.php"); ?>   

<div class="contenido">
    <div class="encabezado">
        <a href="index.php?p=departamentos&id=<?php echo $publi['id_departamento']?>"><p><?php echo $publi['departamento']?></p></a>
        <h1><?php echo $publi['titular']?></h1>
        <div class="hr"></div>
    </div>
    
    <article>
        <div class="imagen">
            <?php 
                $imagen1 = $publi['imagen1'];
                $imagen2 = $publi['imagen2'];
                $imagen3 = $publi['imagen3'];
            ?>
            <div class="swiper-container">
            <div class="swiper-wrapper">

            <?php if(empty($imagen3) and $imagen2==true){ ?>
                <div class="swiper-slide">
                    <img src="<?php echo $imagen1?>" onclick="cargarImagenEnModal('<?php echo $imagen1?>')">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo $imagen2?>" onclick="cargarImagenEnModal('<?php echo $imagen2?>')">
                </div>
            <?php } elseif(empty($imagen2) and empty($imagen3)){ ?>
                <div class="swiper-slide">
                    <img src="<?php echo $imagen1?>" onclick="cargarImagenEnModal('<?php echo $imagen1?>')">
                </div>
            <?php } else{ ?>
                <div class="swiper-slide">
                    <img src="<?php echo $imagen1?>" onclick="cargarImagenEnModal('<?php echo $imagen1?>')">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo $imagen2?>" onclick="cargarImagenEnModal('<?php echo $imagen2?>')">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo $imagen3?>" onclick="cargarImagenEnModal('<?php echo $imagen3?>')">
                </div>
            <?php } ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>      
        </div>  
        <?php
            $fechaOriginal = $publi['fecha'];
            $timestamp = strtotime(str_replace('/', '-', $fechaOriginal));

            $mesesEnEspanol = array(
                1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
                5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
                9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
            );

            $fechaDividida = getdate($timestamp);
            $mesNumero = $fechaDividida['mon'];
            $mesNombre = $mesesEnEspanol[$mesNumero];

            $fechaFormateada = $fechaDividida['mday'] . ' de ' . $mesNombre . ' del ' . $fechaDividida['year'];
                        
        ?>
        <p>Fecha: <?php echo $fechaFormateada; // Salida: 7 de agosto del 2023?></p>
        
        <p><?php echo $publi['cuerpo']?></p>
        
    </article> 
    <div class="sidebar">
        <div class="latest-news">
            <h3>Últimas Noticias</h3>
            <div class="linea-horizontal">
                <div></div>
            </div>
            <a href="index.php?p=publicacion&id=<?php echo $ultima['id']?>">
            <div class="principal">
                <div class="imagen">
                    <img src="<?php echo $ultima['imagen1']?>" onclick="">
                </div>
                <p><?php echo $ultima['titular']?></p>
            </div>
            </a>
        <?php foreach($ultimas4 as $row)
        { 
            $id = $row['id'];
            $titular = $row['titular']; 
            $imagen1 = $row['imagen1'];
        ?>  <a href="index.php?p=publicacion&id=<?php echo $id?>">
            <div class="nota">
                
                <div class="imagen">
                    <img src="<?php echo $imagen1?>" alt="">
                </div>
                <p><?php echo $titular?></p>
                
            </div>
            </a>
            <?php } ?>  
        </div>
    </div>
</div>
    
</body>
<?php
include("Views/modales.php"); 
include("Views/layouts/scripts.php") ?>  

</html>