var modal = document.getElementById("myModal");
var btn = document.getElementById("openModal");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

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
});

//Modal agregar
var modalBtn = document.getElementById("modal_btn_form");
var modalForm = document.getElementById("modal_formu");
var closeBtn = document.getElementsByClassName("close_form")[0];

modalBtn.addEventListener("click", function() {
  modalForm.style.display = "block";
});

closeBtn.addEventListener("click", function() {
  modalForm.style.display = "none";
});

window.addEventListener("click", function(event) {
  if (event.target == modalForm) {
    modalForm.style.display = "none";
  }
});




function visualizar(){
  var modalVis = document.getElementById("modal_visu");
  var closeVis = document.getElementsByClassName("close_vis")[0];

  modalVis.style.display = "block";

  window.addEventListener("click", function(event) {
    if (event.target == modalVis) {
      modalVis.style.display = "none";
    }
  });

  closeVis.addEventListener("click", function() {
    modalVis.style.display = "none";
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
