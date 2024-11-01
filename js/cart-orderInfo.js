// hiển thị mỗi hình thức nhận hàng
document.querySelectorAll('input[name="delivery"]').forEach(radio => {
    radio.addEventListener('change', function () {
        if (this.value === 'home') {
            document.getElementById('homeDelivery').style.display = 'block';
            document.getElementById('storePickup').style.display = 'none';
        } else {
            document.getElementById('homeDelivery').style.display = 'none';
            document.getElementById('storePickup').style.display = 'block';
        }
    });
});

// 
document.querySelectorAll('.option').forEach(option => {
    option.addEventListener('click', function () {
        document.querySelectorAll('.option').forEach(opt => opt.classList.remove('selected'));
        this.classList.add('selected');
    });
});