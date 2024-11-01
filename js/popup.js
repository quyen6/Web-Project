function showPopup() {
    document.getElementById('popup').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

document.querySelector('.log-in-icon').addEventListener('click', function (event) {
    event.preventDefault();
    showPopup();
});

    