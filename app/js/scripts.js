// Función para configurar el menú y el main
function configurarMenuYMain() {
    const cloud = document.getElementById("menu-icon");
    const barraLateral = document.querySelector(".barra-lateral");
    const spans = document.querySelectorAll("span");
    const palanca = document.querySelector(".switch");
    const circulo = document.querySelector(".circulo");
    const menu = document.querySelector(".menu");
    const main = document.querySelector("main");

    // Función para cambiar el estado del menú
    function cambiarEstadoMenu() {
        barraLateral.classList.toggle("max-barra-lateral");
        if (barraLateral.classList.contains("max-barra-lateral")) {
            menu.children[0].style.display = "none";
            menu.children[1].style.display = "block";
        } else {
            menu.children[0].style.display = "block";
            menu.children[1].style.display = "none";
        }
        if (window.innerWidth <= 320) {
            barraLateral.classList.add("mini-barra-lateral");
            main.classList.add("min-main");
            spans.forEach((span) => {
                span.classList.add("oculto");
            });
        }
    }

    // Evento de clic en el menú
    menu.addEventListener("click", cambiarEstadoMenu);

    // Evento de clic en la palanca
    palanca.addEventListener("click", () => {
        let body = document.body;
        body.classList.toggle("dark-mode");

        // Guardar el estado del modo oscuro en LocalStorage
        if (body.classList.contains("dark-mode")) {
            localStorage.setItem("modoOscuro", "activo");
        } else {
            localStorage.setItem("modoOscuro", "inactivo");
        }

        circulo.classList.toggle("prendido");
    });

    // Evento de clic en el cloud
    cloud.addEventListener("click", () => {
        barraLateral.classList.toggle("mini-barra-lateral");
        main.classList.toggle("min-main");
        spans.forEach((span) => {
            span.classList.toggle("oculto");
        });
    });
}

// Evento DOMContentLoaded para inicializar todo cuando el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", () => {
    configurarMenuYMain();

    // Verificar el estado del modo oscuro almacenado en LocalStorage
    if (localStorage.getItem("modoOscuro") === "activo") {
        document.body.classList.add("dark-mode");
    }
});
