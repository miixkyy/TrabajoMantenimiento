<!--Modal imagen-->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img src="" alt="Imagen" class="modal-content">
</div>

<!--Modal Visualizar-->
<div id="modal_visu" class="modal_vis">
    <div class="modal-vis-content">

    </div>
</div>

<style>
.imagePreview {
    width: 10rem;
    height: 10rem;
    border: 1px solid #ccc;
    overflow: hidden;
    margin-right: 10px;
}
.imagePreview img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

</style>

<!--Modal formulario agregar-->
<div id="modal_formu" class="modal_form">
<div class="modal-content">
    <span class="close_form">&times;</span>
    <div class="closer">
        <h2>Agregar</h2>
    </div> 
    <form method="POST" action="index.php?c=agregar" enctype="multipart/form-data">
        <scroll-container>
        <scroll-page>
            <label for="nombre">Titular</label>
            <input type="text" id="nombre" name="titular" placeholder="Titular" required>
            
            <label for="email">Descripcion</label>
            <textarea id="comentarios" name="descripcion" rows="3" cols="50" placeholder="Descripcion" required></textarea>

            <label for="email">Cuerpo</label>
            <textarea id="comentarios" name="cuerpo" rows="4" cols="50" placeholder="Cuerpo de la publicacion" required></textarea>

            <?php if(!empty($_SESSION['id_usuario']) and $_SESSION['id_usuario'] == 2){ ?>
            <label for="selextor">Departamento</label>
            <div class="content-select">
                <select name="selector">
                    <option value="1">Control Escolar</option>
                    <option value="2">Prácticas Profesionales</option>
                    <option value="3">Dirección</option>
                    <option value="4">Servicio Social</option>
                    <option value="5">Promocion Cultural y Deportival</option>
                    <option value="6">Prefectura</option>
                    <option value="7">Orientación Educativa</option>
                    <option value="8">Cordinacion de Carreras</option>
                </select>
            </div>
            <?php }?>

            <label for="selextor">Numero de Imagenes</label>
            <div class="content-select">
                <select id="selector" onchange="mostrarInputs()">
                    <option value="1">1 Imagen</option>
                    <option value="2">2 Imagenes</option>
                    <option value="3">3 Imagenes</option>
                </select>
            </div>
            <div class="imagenes" id="inputsContainer">
                <div class="img">
                    <label for="file-input" class="custom-file-upload">
                        <label for="email">Imagen 1: </label>
                        <div class="imagePreview" id="imagePreview1"></div>
                        <input type="file" id="file-input1" name="imagen1" class="upload-button" onchange="displayImagePreview('file-input1', 'imagePreview1')" required>
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
            <input type="text" id="Edititular" name="nombre" placeholder="Titular">
            
            <label for="email">Descripcion</label>
            <input type="text" id="Editdescripcion" name="email" placeholder="Descipcion" value="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem." required>
            
            <label for="email">Cuerpo</label>
            <textarea id="Editcuerpo" name="comentarios" rows="4" cols="50" placeholder="Cuerpo de la publicacion" required>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem. </textarea>
        
            <div class="imagenes" id="inputsContainer">
                <div class="img" id="img1">
                    <label for="file-input" class="custom-file-upload">
                        <label for="email">Imagen 1: </label>
                        <div class="imagePreview" id="imageE1"></div>
                        <input type="file" id="file-inpEd1" name="imagen1" class="upload-button" onchange="displayImagePreview('file-inpEd1', 'imageE1')" required>
                    </label>   
                </div>
                <div class="img" id="img2">
                    <label for="file-input" class="custom-file-upload">
                        <label for="email">Imagen 2: </label>
                        <div class="imagePreview" id="imageE2"></div>
                        <input type="file" id="file-inpEd2" name="imagen2" class="upload-button" onchange="displayImagePreview('file-inpEd2', 'imageE2')" required>
                    </label>  
                </div>
                <div class="img" id="img3">
                    <label for="file-input" class="custom-file-upload">
                        <label for="email">Imagen 3: </label>
                        <div class="imagePreview" id="imageE3"></div>
                        <input type="file" id="file-inpEd3" name="imagen3" class="upload-button" onchange="displayImagePreview('file-inpEd3', 'imageE3')" required>
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
