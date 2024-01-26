let currentCount = 1;
const maxCount = 3;
const minCount = 1;

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
        
        var formulario = $('#EditForm');
        formulario.attr('action', formulario.attr('action') + '&id=' + data.id);

        $("#Edititular").val(data.titular);
        $("#Editcuerpo").text(data.cuerpo);

        $("#imageE1").empty();
        $("#imageE2").empty();
        $("#imageE3").empty();

        $("#img2").css("display", "block");
        $("#img3").css("display", "block");

        $("#imageE1").append($("<img>").attr("src", data.imagen1));
        $("#imageE2").append($("<img>").attr("src", data.imagen2));
        $("#imageE3").append($("<img>").attr("src", data.imagen3));

        currentCount = 3;
        $("#counterDisplay").text(currentCount);
        if (data.imagen3 == null || data.imagen3 === "") {
          $("#img3").css("display", "none");
          currentCount = 2;
          $("#counterDisplay").text(currentCount);
        }

        if (data.imagen2 == null || data.imagen2 === "") {
          $("#img2").css("display", "none");
          currentCount = 1;
          $("#counterDisplay").text(currentCount);
        }

        $("#numImg").val(currentCount);
        


        $(".imagePreview").each(function() {
          $(this).css("display", "block");
        });
        
        $("#depactual").text(data.departamento);
        actualizarContadorEdit();

        
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




//Menu hamburguesa
function miFuncion() {
  var checkbox = document.getElementById("toggler");
  var lat = document.getElementById("lateral");
  var label = document.querySelector('label[for="toggler"]');
      
  if (checkbox.checked) {
    // El checkbox está marcado, realiza alguna acción
    lat.style.display = "block"
    label.className = "fas fa-times";
    $("#navlat").text("Cerrar");
  } else {
    // El checkbox no está marcado, realiza alguna otra acción
    lat.style.display = "none"
    label.className = "fas fa-bars";
    $("#navlat").text("Departamentos");
  }
}


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

function actualizarContador() {
  const textarea = document.getElementById("titular");
  const contador = document.getElementById("contador");
  const caracteresRestantes = textarea.value.length;
  contador.textContent = `${caracteresRestantes}/150 caracteres`;
}

function actualizarContadorEdit() {
  const textarea = document.getElementById("Edititular");
  const contador = document.getElementById("Editcontador");
  const caracteresRestantes = textarea.value.length;
  contador.textContent = `${caracteresRestantes}/150 caracteres`;
}





function incrementCounter() {
  if (currentCount < maxCount) {
    currentCount++;
    updateCounterDisplay();
  }
}

function decrementCounter() {
  if (currentCount > minCount) {
    currentCount--;
    updateCounterDisplay();
  }
}

function updateCounterDisplay() {
  document.getElementById("counterDisplay").innerText = currentCount;
  imagenesEdit();
}

function imagenesEdit() {
  var valorSeleccionado = currentCount;
  if (valorSeleccionado === 2) {
    $("#img2").css("display", "block");
    $("#img3").css("display", "none");
  } 
  if(valorSeleccionado === 3){
    $("#img2").css("display", "block");
    $("#img3").css("display", "block");
  } 
  if(valorSeleccionado === 1){
    $("#img2").css("display", "none");
    $("#img3").css("display", "none");
  }
  $("#numImg").val(valorSeleccionado);
}