//modal imagenes
var modal = document.getElementById("myModal");

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function cargarImagenEnModal(imagenSrc) {
  // Obtener referencias a los elementos del modal
  var modal = document.getElementById("myModal");
  var modalImg = document.getElementsByClassName("modal-content")[0];
  
  // Mostrar el modal
  modal.style.display = "block";
  
  // Asignar la imagen al atributo src del elemento img en el modal
  modalImg.src = imagenSrc;
  
  // Agregar función para cerrar el modal al hacer clic en la "X"
  var closeBtn = document.getElementsByClassName("close")[0];
  closeBtn.onclick = function() {
    modal.style.display = "none";
  }
}

/*
//Modal editar
var modalBtnEdit = document.getElementById("modal_btn_edit");
var modalEdit = document.getElementById("modal_edite");
var closeBtnEdit = document.getElementsByClassName("close_edit")[0];

modalBtnEdit.addEventListener("click", function() {
  modalEdit.style.display = "block";
});

closeBtnEdit.addEventListener("click", function() {
  modalEdit.style.display = "none";
});

window.addEventListener("click", function(event) {
  if (event.target == modalEdit) {
    modalEdit.style.display = "none";
  }
});*/

//Modal agregar
function agregar() {
  var modalForm = document.getElementById("modal_formu");
  var closeBtn = document.getElementsByClassName("close_form")[0];
  
  modalForm.style.display = "block";

  closeBtn.addEventListener("click", function() {
    modalForm.style.display = "none";
  });
  
  window.addEventListener("click", function(event) {
    if (event.target == modalForm) {
      modalForm.style.display = "none";
    }
  });
}


// Modificar la función visualizar
function editar(id) {
  // Realizar una solicitud AJAX para obtener los datos del ID proporcionado
  $.ajax({
    type: "GET",
    url: "index.php?c=visualizar",
    data: { id: id },
    dataType: "json",
    success: function (data) {
      // Procesar los datos recibidos y llenar el modal con ellos
      if (data) {
        
        var modal = document.getElementById("modal_edite");
        var close = document.getElementsByClassName("close_edit")[0];


        $("#Edititular").val(data.titular);
        $("#Editdescripcion").val(data.descripcion);
        $("#Editcuerpo").text(data.cuerpo);

        $("#imageE1").empty();
        $("#imageE2").empty();
        $("#imageE3").empty();

        $("#img2").css("display", "block");
        $("#img3").css("display", "block");

        $("#imageE1").append($("<img>").attr("src", data.imagen1));
        $("#imageE2").append($("<img>").attr("src", data.imagen2));
        $("#imageE3").append($("<img>").attr("src", data.imagen3));

        if (data.imagen2 == null || data.imagen2 === "") {
          $("#img2").css("display", "none");
        }
        if (data.imagen3 == null || data.imagen3 === "") {
          $("#img3").css("display", "none");
        }


        $(".imagePreview").each(function() {
          $(this).css("display", "block");
        });
        
        // Mostrar el modal
        modal.style.display = "block";

        // Cerrar el modal al hacer clic fuera de él
        window.addEventListener("click", function (event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        });

        // Cerrar el modal al hacer clic en el botón de cierre
        close.addEventListener("click", function () {
          modal.style.display = "none";
        });
      }
    },
    error: function () {
      // Manejar el error si algo sale mal con la solicitud AJAX
      alert("Error al obtener los datos del servidor.");
    },
  });
}


// Modificar la función visualizar
function visualizar(id) {
  // Realizar una solicitud AJAX para obtener los datos del ID proporcionado
  $.ajax({
    type: "GET",
    url: "index.php?c=visualizar",
    data: { id: id },
    dataType: "json",
    success: function (data) {
      // Procesar los datos recibidos y llenar el modal con ellos
      if (data) {
        var modalVis = document.getElementById("modal_visu");
        var closeVis = document.getElementsByClassName("close_vis")[0];
        var modalContent = document.querySelector(".modal-vis-content");

        modalContent.innerHTML = ""; // Limpiar el contenido anterior del modal

        // Agregar el span de cierre al inicio de la div modal-vis-content
        var closeSpan = document.createElement("span");
        closeSpan.className = "close_vis";
        closeSpan.innerHTML = "&times;";
        modalContent.appendChild(closeSpan);

        // Crear los elementos HTML para mostrar los datos recibidos
        var closer = document.createElement("div");
        closer.className = "closer";

        var h2 = document.createElement("h2");
        h2.textContent = data.titular;


        
        var p = document.createElement("p");
        // Suponiendo que data.ip_departamentos contiene el ID que deseas utilizar

        // Crea un elemento <a> y asigna el atributo href con el enlace deseado
        var linkElement = document.createElement("a");
        linkElement.href = "index.php?p=departamentos&id=" + data.id_departamento;
        linkElement.id = "underline";
        linkElement.textContent = data.departamento;

        var separatorElement = document.createElement("span");
        separatorElement.textContent = "  "; // Puedes cambiar el separador si lo deseas

        // Crea un segundo elemento <span> para la fecha
        var fechaElement = document.createElement("span");
        fechaElement.textContent = data.fecha;

        // Añade los elementos creados al elemento contenedor (p)
        p.appendChild(linkElement);
        p.appendChild(separatorElement)
        p.appendChild(fechaElement);




        var scrollContainer = document.createElement("scroll-container-publi");
        var scrollPage = document.createElement("scroll-page");

        var texto = document.createElement("div");
        texto.className = "texto";
        var pTexto = document.createElement("p");
        pTexto.textContent = data.cuerpo;
        texto.appendChild(pTexto);

        var imagesDiv = document.createElement("div");
        imagesDiv.className = "images";

        // Crear y agregar las imágenes al div "images"
        for (var i = 1; i <= 3; i++) {
          if (data["imagen" + i] !== null && data["imagen" + i] !== "") {
            var img = document.createElement("img");
            img.src = data["imagen" + i];
            imagesDiv.appendChild(img);
          }
        }

        // Agregar los elementos creados al contenido del modal
        closer.appendChild(h2);
        closer.appendChild(p);
        modalContent.appendChild(closer);
        scrollPage.appendChild(texto);
        scrollPage.appendChild(imagesDiv);
        scrollContainer.appendChild(scrollPage);
        modalContent.appendChild(scrollContainer);

        // Mostrar el modal
        modalVis.style.display = "block";

        // Cerrar el modal al hacer clic fuera de él
        window.addEventListener("click", function (event) {
          if (event.target == modalVis) {
            modalVis.style.display = "none";
          }
        });

        // Cerrar el modal al hacer clic en el botón de cierre
        closeSpan.addEventListener("click", function () {
          modalVis.style.display = "none";
        });
      }
    },
    error: function () {
      // Manejar el error si algo sale mal con la solicitud AJAX
      alert("Error al obtener los datos del servidor.");
    },
  });
}


//Menu hamburguesa
function miFuncion() {
  var checkbox = document.getElementById("toggler");
  var lat = document.getElementById("lateral");
  if (checkbox.checked) {
    // El checkbox está marcado, realiza alguna acción
    lat.style.display = "block"
  } else {
    // El checkbox no está marcado, realiza alguna otra acción
    lat.style.display = "none"
  }
}

// Verificar si se cumple la regla @media (ancho de pantalla menor a 600px)
var mediaQuery = window.matchMedia("(max-width: 900px)")
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


function mostrarInputs() {
  var selector = document.getElementById("selector");
  var valorSeleccionado = selector.value;

  var inputsContainer = document.getElementById("inputsContainer");
  inputsContainer.innerHTML = ""; // Limpiar el contenedor de inputs


  for (var i = 0; i < valorSeleccionado; i++) {
    var div = document.createElement("div");
    div.className = "img";

    var label = document.createElement("label");
    label.htmlFor = "file-input";
    label.className = "custom-file-upload";
    
    var labelImg = document.createElement("label");
    labelImg.innerText = "Imagen " + (i + 1) + ": ";

    var input = document.createElement("input");
    input.type = "file";
    input.id = "file-input" + (i + 1);
    input.name = "imagen" + (i + 1);
    input.className = "upload-button";
    input.setAttribute("onchange", "displayImagePreview('file-input"+ (i + 1)+"', 'imagePreview"+ (i + 1)+"')");
    if(i==0){
      input.required = true;
    }

    var imgPreview = document.createElement("div");
    imgPreview.id = "imagePreview" + (i + 1);
    imgPreview.className = "imagePreview";

    label.appendChild(labelImg);
    label.appendChild(imgPreview);
    label.appendChild(input);
    div.appendChild(label);
    inputsContainer.appendChild(div);
  }
}

function displayImagePreview(input, preview) {
    var inpu = document.getElementById(input);
    const file = inpu.files[0];

  if (file && file.type.startsWith("image/")) {
    const reader = new FileReader();
    reader.onload = function(event) {
      const imagePreview = document.getElementById(preview);
      imagePreview.innerHTML = "";
      imagePreview.innerHTML = `<img src="${event.target.result}" alt="Imagen Cargada">`;
      imagePreview.style.display = "block";
      
    };
    reader.readAsDataURL(file);
  } else {
    alert("Por favor, selecciona una imagen válida.");
  }
}

