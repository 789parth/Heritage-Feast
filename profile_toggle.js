document.addEventListener("DOMContentLoaded", function () {
    let profile = document.querySelector('.profile');
    let userBtn = document.querySelector('#user-btn');

    userBtn.addEventListener('click', function (event) {
        event.preventDefault();
        profile.classList.toggle('active');
    });
});
