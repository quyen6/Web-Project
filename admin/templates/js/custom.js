document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.getElementById('cartegory_id');
    const phoneSpecs = document.querySelector('.phone-specs');
    const laptopSpecs = document.querySelector('.laptop-specs');

    function toggleInputs(element, enable) {
        const inputs = element.querySelectorAll('input, select');
        inputs.forEach(input => {
            input.disabled = !enable;
        });
    }

    categorySelect.addEventListener('change', function() {
        if (this.value === '1') { // Điện thoại
            phoneSpecs.style.display = 'block';
            laptopSpecs.style.display = 'none';
            toggleInputs(phoneSpecs, true);
            toggleInputs(laptopSpecs, false);
        } else if (this.value === '2') { // Laptop
            phoneSpecs.style.display = 'none';
            laptopSpecs.style.display = 'block';
            toggleInputs(phoneSpecs, false);
            toggleInputs(laptopSpecs, true);
        } else {
            phoneSpecs.style.display = 'none';
            laptopSpecs.style.display = 'none';
            toggleInputs(phoneSpecs, false);
            toggleInputs(laptopSpecs, false);
        }
    });
});

