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
    let previousFocus = null;


    function openModal(form) {

        selectedForm = form;
        previousFocus = document.activeElement;

        modalTitle.textContent =
            form.dataset.confirmTitle || 'Confirm Action';

        modalMessage.textContent =
            form.dataset.confirmMessage || 'Are you sure?';

        modalConfirm.textContent =
            form.dataset.confirmButton || 'Confirm';


        modalConfirm.classList.remove('modal-danger');

        if (form.dataset.confirmType === 'delete') {
            modalConfirm.classList.add('modal-danger');
        }


        modal.classList.add('show');

        document.body.style.overflow = 'hidden';

        modalConfirm.focus();
    }


    function closeModal() {

        modal.classList.remove('show');

        document.body.style.overflow = '';

        selectedForm = null;

        if (previousFocus) {
            previousFocus.focus();
            previousFocus = null;
        }
    }


    const confirmForms =
        document.querySelectorAll('form[data-confirm]');


    confirmForms.forEach(function (form) {

        form.addEventListener('submit', function (event) {

            event.preventDefault();

            openModal(form);

        });

    });


    modalCancel.addEventListener('click', function () {

        closeModal();

    });


    modalConfirm.addEventListener('click', function () {

        if (!selectedForm) {
            return;
        }

        const form = selectedForm;

        closeModal();

        form.submit();

    });


    modal.addEventListener('click', function (event) {

        if (event.target === modal) {
            closeModal();
        }

    });


    document.addEventListener('keydown', function (event) {

        if (!modal.classList.contains('show')) {
            return;
        }

        if (event.key === 'Escape') {
            closeModal();
        }

    });

});