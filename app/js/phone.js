
// Obtén el modal
var modal = document.getElementById("modalRegistrar");

// Obtén el botón que abre el modal
var btn = document.getElementById("btnRegistrar");

// Obtén el elemento <span> que cierra el modal
var span = document.getElementsByClassName("close")[0];

// Cuando el usuario haga clic en el botón, abre el modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// Cuando el usuario haga clic en <span> (x), cierra el modal
span.onclick = function() {
  modal.style.display = "none";
}


  
