const toggleSwitch = document.getElementById('toggleSwitch');
const statusText = document.getElementById('status');

toggleSwitch.addEventListener('change', function () {
    if (this.checked) {
        statusText.textContent = 'Disponible';
    } else {
        statusText.textContent = 'No disponible';
    }
});
