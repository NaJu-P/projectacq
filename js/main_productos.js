window.onload = inicio;

function inicio() {
  let page = document.getElementById("page");

  let cuenta = page.getAttribute("data-mi-variable");
  if (cuenta) {
    var opciones = document.getElementById('opciones');
    var primerInput = opciones.querySelector('input');

    primerInput.insertAdjacentHTML('afterEnd', '<abbr title="Descuento de la pagina"><div class="image-container"><h2>%50</h2></div></abbr>');
  }
  /*const mensaje = document.getElementById('mensaje');
    mensaje.style.opacity = '0';

    const formulario = document.querySelectorAll('.product-container');
    formulario.forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            mensaje.style.display = 'block';
            mensaje.style.opacity = '0.9';

            setTimeout(function () {

                mensaje.style.opacity = '0';
                setTimeout(function () {
                    mensaje.style.display = 'none';
                }, 500);
            }, 3000);
        });
    });

    mensaje.addEventListener('click', function () {
        mensaje.style.opacity = '0';
        setTimeout(function () {
            mensaje.style.display = 'none';
        }, 500);
    });
    */
}
