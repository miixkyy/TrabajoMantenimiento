<?php
include("conexion.php");
if(!empty($_GET['id'])){
    $id=$_GET['id'];
    $sql = $db->conectar()->prepare('SELECT * FROM publicaciones WHERE id = :id');
    $sql->execute(['id' => $id]);
    $row = $sql->fetch(PDO::FETCH_NUM);
    if($row == true)
    { 
        $titular = $row[1];   
        ?>

        <span class="close_vis">&times;</span>
        <div class="closer">
            <h2><?php echo $titular?></h2>
            <p> <span id="underline">Docentes</span>  <span>02/20/2023</span></p>
        </div> 
        <scroll-container-publi>
            <scroll-page>
                <div class="texto">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi accumsan pharetra ullamcorper. Curabitur aliquam eleifend dolor, quis venenatis tellus laoreet ac. Quisque euismod velit arcu. Donec porttitor aliquet mauris sed pulvinar. Maecenas eu lacus et purus maximus sagittis. Sed fermentum sed arcu nec accumsan. Sed sed risus mollis, ultricies eros eget, imperdiet lectus. Duis nec est lacus. Fusce eu felis in ligula ullamcorper condimentum sit amet id lorem. Fusce tincidunt eleifend pretium. Maecenas quis posuere libero. Sed dictum, turpis rutrum ullamcorper ultricies, nulla ipsum euismod mauris, non ornare velit odio quis sapien. Praesent pulvinar hendrerit congue. Vivamus lacinia interdum tempor. Morbi euismod dolor ante, ut semper purus elementum imperdiet. Aenean velit mauris, molestie ac tellus et, egestas porttitor ex.
                        <br>
                        In consectetur nunc diam. Sed commodo scelerisque leo sed iaculis. Aliquam ornare nisi lacus, id tincidunt dui hendrerit sit amet. Nulla eleifend mollis ipsum, ut luctus ligula viverra et. Nam eget turpis orci. Sed lobortis, orci nec rutrum semper, leo nisi mollis turpis, quis faucibus enim libero ut nisi. Duis vehicula turpis vitae enim ultrices, sit amet molestie ipsum auctor. Etiam at lectus a massa sagittis posuere. Sed in tincidunt leo. Suspendisse felis felis, pharetra a ullamcorper nec, pharetra at leo. Aliquam egestas nunc nunc, vitae blandit mi sodales eu. Integer diam ligula, sagittis at arcu eu, vulputate feugiat ipsum. Nam facilisis ut quam vel lobortis. Nullam maximus condimentum urna. Donec congue, orci sit amet suscipit convallis, risus mauris aliquam mauris, ac rhoncus eros mi nec sapien.
                    </p>
                </div>
                
                <div class="images">
                    <img src="imagenes/image 2.png">
                    <img src="imagenes/image 3.png">
                    <img src="imagenes/image 4.png">
                </div>
            </scroll-page>
        </scroll-container-publi>
        <?php
    }else{
        echo "<script>alert('nara')</script>";
    }
}else{
    echo 'Content not found....';
}
?>