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


document.addEventListener('DOMContentLoaded', function() {
    var cart_count = 0;  // Biến để lưu số lần nhấn button
    // var cartCountElement = document.getElementById('cart_count');

    var buttons = document.querySelectorAll('.add-product');
    
    buttons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của button
            
            // Tăng số lần nhấn lên 1
            cart_count++;
            
            // Cập nhật nội dung của phần tử HTML để hiển thị số lượng
            if (cart_count > 0 ){
                sl = `<span class="cart-quantity-item" id="cart_count">`+ cart_count + `</span>`;
                document.getElementById('cart_count').innerText=sl;
            }else {
                sl = `<span class="cart-quantity-item" id="cart_count">0</span>`;
                document.getElementById('cart_count').innerText=sl;
            }
        });
    });
});


