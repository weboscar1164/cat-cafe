// Burger menus
document.addEventListener('DOMContentLoaded', function() {
    // open
    const burger = document.querySelectorAll('.navbar-burger');
    const menu = document.querySelectorAll('.navbar-menu');

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    // close
    const close = document.querySelectorAll('.navbar-close');
    const backdrop = document.querySelectorAll('.navbar-backdrop');

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }
});

//modal
function toggleModal(modalID) {
    const $targetModal = document.getElementById(modalID);
    const $targetModalBackdrop = document.getElementById(modalID + "-backdrop");

    $targetModal.classList.toggle("hidden");
    $targetModalBackdrop.classList.toggle("hidden");
    $targetModal.classList.toggle("frex");
    $targetModalBackdrop.classList.toggle("frex");

    
}

function deleteModalControl(value) {
        const testTarget = document.getElementById("test-target");
        const deleteForm = document.getElementById("delete-form");
    testTarget.innerHTML = value;
    deleteForm.action = value
}
