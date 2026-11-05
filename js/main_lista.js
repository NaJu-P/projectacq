
    window.onload = inicio;

    function inicio() {
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
   
        const confirmModal = document.getElementById('confirm-modal');
        const modalConfirm = document.getElementById('modal-confirm');
        const modalCancel = document.getElementById('modal-cancel');
        const modalClose = document.getElementById('modal-close');
    
        let link = null; // Variable para almacenar el enlace
        
        const deleteLinks = document.querySelectorAll('.delete-link');
        deleteLinks.forEach((deleteLink) => {
            deleteLink.addEventListener('click', () => {
                confirmModal.style.display = 'block';
                link = deleteLink.getAttribute('data-href'); // Almacena el atributo data-href del enlace
            });
        });
    
        modalCancel.addEventListener('click', () => {
            confirmModal.style.display = 'none';
        });
    
        modalClose.addEventListener('click', () => {
            confirmModal.style.display = 'none';
        });
    
        modalConfirm.addEventListener('click', () => {
            if (link) {
                // Verifica que link no sea nulo antes de redirigir
                window.location.href = link;
            }
        });
    }
