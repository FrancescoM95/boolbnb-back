const deleteForms = document.querySelectorAll('.delete-form');
const restoreForms = document.querySelectorAll('.restore-form');
const modal = document.getElementById('modal');
const modalBody = document.querySelector('.modal-body');
const modalTitle = document.querySelector('.modal-title');
const confirmationButton = document.getElementById('modal-confirmation-button');

let activeForm = null;

// Modale eliminazione appartamento
deleteForms.forEach(form => {
    form.addEventListener('submit', e => {
        e.preventDefault();

        activeForm = form;

        confirmationButton.innerText = 'Conferma Eliminazione';
        confirmationButton.className = 'btn btn-danger';
        modalTitle.innerText = 'Elimina appartamenti';
        modalBody.innerText = 'Sei sicuro di voler procedere all\'eliminazione?';
    })
})

// Modale ripristino appartamento
restoreForms.forEach(form => {
    form.addEventListener('submit', e => {
        e.preventDefault();

        activeForm = form;

        confirmationButton.innerText = 'Conferma Ripristino';
        confirmationButton.className = 'btn btn-success';
        modalTitle.innerText = 'Ripristina appartamento';
        modalBody.innerText = 'Sei sicuro di voler procedere al ripristino?';
    })
})

confirmationButton.addEventListener('click', () => {
    if (activeForm) activeForm.submit();
});

modal.addEventListener('hidden.bs.modal', () => {
    activeForm = null;
})