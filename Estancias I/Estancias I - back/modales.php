<!--Modal imagen-->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img src="" alt="Imagen" class="modal-content">
</div>

<!--Modal Visualizar-->
<div id="modal_visu" class="modal_vis">
    <div class="modal-vis-content">
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
    </div>
</div>

<!--Modal formulario agregar-->
<div id="modal_formu" class="modal_form">
<div class="modal-content">
    <span class="close_form">&times;</span>
    <div class="closer">
        <h2>Agregar</h2>
    </div> 
    <form method="POST" action="conexion_agregar.php?id=<?php echo $id1 ?>" enctype="multipart/form-data">
        <scroll-container>
            <scroll-page>
                <label for="nombre">Titular</label>
                <input type="text" id="nombre" name="titular" placeholder="Titular" required>
                
                <label for="email">Descripcion</label>
                <textarea id="comentarios" name="descripcion" rows="3" cols="50" placeholder="Descripcion" required></textarea>

                <label for="email">Cuerpo</label>
                <textarea id="comentarios" name="cuerpo" rows="4" cols="50" placeholder="Cuerpo de la publicacion" required></textarea>

                <label for="selextor">Numero de Imagenes</label>
                <div class="content-select">
                    <select id="selector" onchange="mostrarInputs()">
                        <option value="1">1 Imagen</option>
                        <option value="2">2 Imagenes</option>
                        <option value="3">3 Imagenes</option>
                    </select>
                    <i></i>
                </div>
                <div class="imagenes" id="inputsContainer">
                    <div class="img">
                        <label for="file-input" class="custom-file-upload">
                            <label for="email">Imagen 1: </label>
                            <input type="file" id="file-input" name="imagen1" class="upload-button" required>
                        </label>                        
                    </div>
                </div>
        </scroll-page>
        </scroll-container>

        <div style="text-align: center;">
            <input type="submit" value="Añadir" name="agregar">
        </div>
    </form>
</div>
</div>

<!--Modal formulario editar-->
<div id="modal_edite" class="modal_edit">
<div class="modal-edit-content">
    <span class="close_edit">&times;</span>
    <div class="closer">
        <h2>Editar</h2>
    </div> 
    <form>
        <scroll-container>
        <scroll-page>
            <label for="nombre">Titular</label>
            <input type="text" id="nombre" name="nombre" placeholder="Titular" value="Titular">
            
            <label for="email">Descripcion</label>
            <input type="text" id="email" name="email" placeholder="Descipcion" value="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem." required>
            
            <label for="email">Cuerpo</label>
            <textarea id="comentarios" name="comentarios" rows="4" cols="50" placeholder="Cuerpo de la publicacion" required>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem. </textarea>
            <div class="imagenes">
                    <div class="img">
                        <label for="file-input" class="custom-file-upload">
                            <label for="email">Imagen 1: </label>
                            <img src="imagenes/image 2.png">
                            <input type="file" id="file-input" name="file-input" accept="image/*" class="upload-button" required>
                        </label>   
                    </div>

                    <div class="img">
                        <label for="file-input" class="custom-file-upload">
                            <label for="email">Imagen 2:</label>
                            <img src="imagenes/image 3.png">
                            <input type="file" id="file-input" name="file-input" accept="image/*" class="upload-button" required>
                        </label>
                    </div>

                    <div class="img">
                        <label for="file-input" class="custom-file-upload">
                            <label for="email">Imagen 3:</label>
                            <img src="imagenes/image 4.png">
                            <input type="file" id="file-input" name="file-input" accept="image/*" class="upload-button" required>
                        </label>
                    </div>
                </div>
        </scroll-page>
        </scroll-container>

        <div style="text-align: center;">
            <input type="submit" value="Añadir">
        </div>
    </form>
</div>
</div>
