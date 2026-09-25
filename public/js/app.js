document.addEventListener('DOMContentLoaded', function () {

    const modal = document.getElementById('confirmationModal');

    if (!modal) {
        return;
    }

    const modalTitle = document.getElementById('modalTitle');
    const modalMessage = document.getElementById('modalMessage');
    const modalConfirm = document.getElementById('modalConfirm');
    const modalCancel = document.getElementById('modalCancel');

    let selectedForm = null;

    const confirmForms = document.querySelectorAll('form[data-confirm]');

    confirmForms.forEach(function (form) {

        form.addEventListener('submit', function (event) {

            event.preventDefault();

            selectedForm = form;

            modalTitle.textContent = form.dataset.confirmTitle;
            modalMessage.textContent = form.dataset.confirmMessage;
            modalConfirm.textContent = form.dataset.confirmButton;

            if (form.dataset.confirmType === 'delete') {
                modalConfirm.classList.add('modal-danger');
            } else {
                modalConfirm.classList.remove('modal-danger');
            }

            modal.classList.add('show');
        });

    });

    modalCancel.addEventListener('click', function () {

        modal.classList.remove('show');
        selectedForm = null;

    });

    modalConfirm.addEventListener('click', function () {

        if (selectedForm) {
            selectedForm.submit();
        }

    });

    modal.addEventListener('click', function (event) {

        if (event.target === modal) {
            modal.classList.remove('show');
            selectedForm = null;
        }

    });

});