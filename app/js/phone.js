const planes = {
  'Plus 1': { detalles: { minutos: "Ilimitados", sms: "Ilimitados" }, gb: 4.00, rm: 199 },
  'Plus 1.5': { detalles: { minutos: "Ilimitados", sms: "Ilimitados" }, gb: 6.50, rm: 239 },
  'Plus 2': { detalles: { minutos: "Ilimitados", sms: "Ilimitados" }, gb: 8.50, rm: 299 },
  'Plus 3': { detalles: { minutos: "Ilimitados", sms: "Ilimitados" }, gb: 10.50, rm: 399 },
  'Plus 4': { detalles: { minutos: "Ilimitados", sms: "Ilimitados" }, gb: 12.00, rm: 499 },
  'Plus 5': { detalles: { minutos: "Ilimitados", sms: "Ilimitados" }, gb: 18.50, rm: 599 },
  'Plus 6': { detalles: { minutos: "Ilimitados", sms: "Ilimitados" }, gb: 20.00, rm: 699 },
  'Plus 7': { detalles: { minutos: "Ilimitados", sms: "Ilimitados" }, gb: 24.00, rm: 799 },
  'Plus 8': { detalles: { minutos: "Ilimitados", sms: "Ilimitados" }, gb: 28.00, rm: 899 },
  'Plus 9': { detalles: { minutos: "Ilimitados", sms: "Ilimitados" }, gb: 34.00, rm: 999 },
  'Plus 12': { detalles: { minutos: "Ilimitados", sms: "Ilimitados" }, gb: 47.00, rm: 1299 },
  'Plus 14': { detalles: { minutos: "Ilimitados", sms: "Ilimitados" }, gb: 62.00, rm: 1499 },
};

// Función para actualizar campos según el plan seleccionado
function actualizarCamposSegunPlan(planSeleccionado) {
  const detallesPlan = planes[planSeleccionado];
  if (detallesPlan) {
    // Actualizar campos para minutos y SMS
    document.getElementById('minutos').value = detallesPlan.detalles.minutos;
    document.getElementById('sms').value = detallesPlan.detalles.sms;

    // Actualizar campos para GB y renta mensual
    document.getElementById('gb').value = detallesPlan.gb;
    document.getElementById('rm').value = (detallesPlan.rm);
  }
}

// Función para mostrar la sección específica del formulario y ocultar las demás
function showSection(sectionNumber) {
  var sections = document.querySelectorAll('.form-section');
  sections.forEach(function(section) {
    section.style.display = 'none';
    var inputs = section.querySelectorAll('input');
    inputs.forEach(function(input) {
      input.removeAttribute('required');
    });
  });

  var sectionToShow = document.getElementById('formSection' + sectionNumber);
  if (sectionToShow) {
    sectionToShow.style.display = 'block';
    var inputsToShow = sectionToShow.querySelectorAll('input');
    inputsToShow.forEach(function(input) {
      if(input.type !== 'button') {
        input.setAttribute('required', '');
      }
    });
  }
}

//Limpiar los valores del formulario
function limpiarFormulario() {
  var form = document.getElementById('registrationForm');
  form.reset();

}



document.addEventListener('DOMContentLoaded', function () {
  showSection(1);

  var modal = document.getElementById("modalRegistrar");
  var btn = document.getElementById("btnRegistrar");
  var span = document.getElementsByClassName("close")[0];

  btn.onclick = function() {
    modal.style.display = "block";
  }

  span.onclick = function() {
    modal.style.display = "none";
  };

  // Eventos para botones de navegación del formulario multi-parte
  var nextBtn1 = document.getElementById("btnNext1");
  var nextBtn2 = document.getElementById("btnNext2");
  var backBtn = document.getElementById("back-btn"); // Asegúrate de que este es el ID correcto del botón "Regresar"

  if (nextBtn1) {
    nextBtn1.addEventListener('click', function() {
      showSection(2);
    });
  }

  if (nextBtn2) {
    nextBtn2.addEventListener('click', function() {
      // Implementar lo que sucede cuando se hace clic en "Registrar"
    });
  }

  if (backBtn) {
    backBtn.addEventListener('click', function() {
      showSection(1);
    });
  }

  // Evento para el selector de planes
  var selectorPlan = document.getElementById('selectorPlan');
  if (selectorPlan) {
    selectorPlan.addEventListener('change', function() {
      actualizarCamposSegunPlan(this.value);
    });
  }

  // Eventos para botones de limpiar
  var btnClean1 = document.getElementById("btnClean1");
  var btnClean2 = document.getElementById("btnClean2");

  if (btnClean1) {
    btnClean1.addEventListener('click', limpiarFormulario);
  }

  if (btnClean2) {
    btnClean2.addEventListener('click', limpiarFormulario);
  }
});
