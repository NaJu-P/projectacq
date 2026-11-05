window.onload = inicio;

function inicio() {
    const confirmModal = document.getElementById('confirm-modal');
    const modalConfirm = document.getElementById('modal-confirm');
    const modalCancel = document.getElementById('modal-cancel');
    const modalClose = document.getElementById('modal-close');

    let link = null;

    const deleteLinks = document.querySelectorAll('.delete-link');
    deleteLinks.forEach((deleteLink) => {
        deleteLink.addEventListener('click', () => {
            confirmModal.style.display = 'block';
            link = deleteLink.getAttribute('data-href');
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
            window.location.href = link;
        }
    });
}

/* solo funciona con un buttom y un onclick ensi mismo
function mostrar(){
    swal('Hola mundo', 'titulo', 'error');  o tambien con success
}

function mostrar(){
    swal("Seguro que quieres continuer?", {
        buttons: ["Ok", "No"]
    });
} */