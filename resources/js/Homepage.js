document.addEventListener('DOMContentLoaded', function () {
    let isModalOpen = false;
    const loginModal = document.getElementById('loginModal');

    if (loginModal) {
        window.addEventListener('scroll', () => {
            if (!isModalOpen) {
                isModalOpen = true;
                loginModal.classList.remove('hidden');
                loginModal.classList.add('flex');
            }
        });

        const closeBtn = loginModal.querySelector('#closeButton');


        loginModal.addEventListener('click', (e) => {
            if (e.target === loginModal) {
                isModalOpen = false;
                loginModal.classList.add('hidden');
                loginModal.classList.remove('flex');
            }
        });

        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                isModalOpen = false;
                loginModal.classList.add('hidden');
                loginModal.classList.remove('flex');
            });
        }
    }
});