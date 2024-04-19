const deleteForms = document.querySelectorAll('.delete-form');
const modal = document.getElementById('modal');
const modalBody = document.querySelector('.modal-body');
const modalTitle = document.querySelector('.modal-title');
const confirmationButton = document.getElementById('modal-confirmation-button');

let activeForm = null;

deleteForms.forEach(form => {
    form.addEventListener('submit', e => {
        e.preventDefault();

        activeForm = form;

        confirmationButton.innerText = 'Conferma Elimina';
        confirmationButton.className = 'btn btn-danger';
        modalTitle.innerText = 'Elimina appartamento';
        modalBody.innerText = 'Sei sicuro di voler eliminare questo appartamento?';
    })
})

confirmationButton.addEventListener('click', () => {
    if (activeForm) activeForm.submit();
});

modal.addEventListener('hidden.bs.modal', () => {
    activeForm = null;
})