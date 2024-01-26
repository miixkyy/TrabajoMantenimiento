<link rel="stylesheet" href="Public/css/style_modales.css">

<!--Modal imagen-->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img src="Public/imagenes/image 2.png" alt="Imagen" class="modal-content">
</div>


<style>
.imagePreview {
    width: 10rem;
    height: 10rem;
    border: 1px solid #ccc;
    overflow: hidden;
    margin-right: 10px;
    border-radius: 0.5rem;x
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
        <scroll-container id="modal">
        <scroll-page>
            <label for="nombre">Titular</label>
            <textarea id="titular" name="titular" rows="3" maxlength="150" cols="50" placeholder="Titular" oninput="actualizarContador()" required></textarea>
            <div id="contador">0/150 caracteres</div>

            <label for="email">Cuerpo</label>
            <textarea id="titular" name="cuerpo" rows="10" cols="50" placeholder="Cuerpo de la publicacion" required></textarea>
            

            <?php if(!empty($_SESSION['id_usuario']) and $_SESSION['id_usuario'] == 2){ ?>
            <label for="selextor">Departamento</label>
            <div class="content-select">
                <select name="selector">
                    <option value="1">Control Escolar</option>
                    <option value="2">Prácticas Profesionales</option>
                    <option value="3">Servicio Social</option>
                    <option value="4">Dirección</option>
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
    <form method="POST" id="EditForm" action="index.php?c=actualizar" enctype="multipart/form-data">
        <scroll-container id="modal">
        <scroll-page>
            <label for="Edititular">Titular</label>
            <textarea id="Edititular" name="titular" rows="3" maxlength="150" cols="50" placeholder="Titular" oninput="actualizarContadorEdit()" required></textarea>
            <div id="Editcontador">0/150 caracteres</div>

            <label for="Editcuerpo">Cuerpo</label>
            <textarea id="Editcuerpo" name="cuerpo" rows="10" cols="50" placeholder="Cuerpo de la publicacion" required>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem. </textarea>
            
            
            <?php if(!empty($_SESSION['id_usuario']) and $_SESSION['id_usuario'] == 2){ ?>
                <div class="departamentos">
                    <label>Departamento</label>
                    <p>Departamento actual: <span id="depactual"></span></p>
                    <div class="content-select">
                        <select name="Editselector">
                            <option value="0">Escoger departamento</option>
                            <option value="1">Control Escolar</option>
                            <option value="2">Prácticas Profesionales</option>
                            <option value="3">Servicio Social</option>
                            <option value="4">Dirección</option>
                            <option value="5">Promocion Cultural y Deportival</option>
                            <option value="6">Prefectura</option>
                            <option value="7">Orientación Educativa</option>
                            <option value="8">Cordinacion de Carreras</option>
                        </select>
                    </div>
                </div>
            <?php } ?>

            <div class="imagenes" id="inputsContainer">
                <div class="img" id="img1">
                    <label for="file-input" class="custom-file-upload">
                        <label for="email">Imagen 1: </label>
                        <div class="imagePreview" id="imageE1"></div>
                        <input type="file" id="file-inpEd1" name="Editimagen1" class="upload-button" onchange="displayImagePreview('file-inpEd1', 'imageE1')" >
                    </label>   
                </div>
                <div class="img" id="img2">
                    <label for="file-input" class="custom-file-upload">
                        <label for="email">Imagen 2: </label>
                        <div class="imagePreview" id="imageE2"></div>
                        <input type="file" id="file-inpEd2" name="Editimagen2" class="upload-button" onchange="displayImagePreview('file-inpEd2', 'imageE2')">
                    </label>  
                </div>
                <div class="img" id="img3">
                    <label for="file-input" class="custom-file-upload">
                        <label for="email">Imagen 3: </label>
                        <div class="imagePreview" id="imageE3"></div>
                        <input type="file" id="file-inpEd3" name="Editimagen3" class="upload-button" onchange="displayImagePreview('file-inpEd3', 'imageE3')">
                    </label>  
                </div>
            </div>
            <Label>Contador de imagenes</Label>
            <div class="contador">
                <div id="counterDisplay" class="counter">1</div>
                <a id="incrementButton" onclick="decrementCounter()">-</a>
                <a id="incrementButton" onclick="incrementCounter()">+</a>
            </div>
            <input type="text" id="numImg" name="numImg"  hidden>
        </scroll-page>
        </scroll-container>

        <div style="text-align: center;">
            <input type="submit" value="Añadir" name="actualizar" >
        </div>
    </form>
</div>
</div>

<script src="Public/js/main.js"></script>

