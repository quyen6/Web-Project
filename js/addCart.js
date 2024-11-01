$(document).ready(function() {
    $('.add-to-cart-form').on('submit', function(e) {
        e.preventDefault();

        var form = $(this);
        var productId = form.find('input[name="product_id"]').val();

        $.ajax({
            url: '',
            method: 'POST',
            data: { product_id: productId },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#cart-count').text(response.totalCount);
                    
                    // // Hiển thị hiệu ứng thêm vào giỏ hàng (tùy chọn)
                    // $('.cart-quantity-item').addClass('animate');
                    // setTimeout(function() {
                    //     $('.cart-quantity-item').removeClass('animate');
                    // }, 500);
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert('Có lỗi xảy ra. Vui lòng thử lại sau.');
            }
        });
    });
});