function loader() {
    document.querySelector('.loader').style.display = 'none';
}
function fadeOut() {
    setInterval(loader, 3000);
}

window.onload = fadeOut();