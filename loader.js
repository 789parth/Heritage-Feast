function loader() {
    document.querySelector('.loader').style.display = 'none';
}
function fadeOut() {
    setInterval(loader, 2000);
}

window.onload = fadeOut();