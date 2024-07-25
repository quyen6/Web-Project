document.addEventListener('DOMContentLoaded', function() {
    const images = [
        './images/banner/galaxy-s24-sale.jpeg',
        './images/banner/iphone-15-pro-max_3.webp',
        './images/banner/image3.jpg', // Add the paths to the remaining images
        './images/banner/image4.jpg'
    ];

    let currentIndex = 0;

    const mainImage = document.getElementById('main-image');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const thumbnails = document.querySelectorAll('.slider-content-bottom li');

    function updateMainImage(index) {
        mainImage.src = images[index];
        thumbnails.forEach((thumbnail, i) => {
            thumbnail.classList.toggle('active', i === index);
        });
    }

    nextBtn.onclick = function() {
        currentIndex = currentIndex + 1 <= images.length - 1 ? currentIndex + 1 : 0;
        updateMainImage(currentIndex);
    }

    prevBtn.onclick = function() {
        currentIndex = currentIndex - 1 >= 0 ? currentIndex - 1 : images.length - 1;
        updateMainImage(currentIndex);
    }

    thumbnails.forEach((thumbnail, key) => {
        thumbnail.addEventListener('click', () => {
            currentIndex = key;
            updateMainImage(currentIndex);
        });
    });

    window.onresize = function(event) {
        updateMainImage(currentIndex);
    };

    // Initialize the main image
    updateMainImage(currentIndex);
});

document.addEventListener('DOMContentLoaded', function() {
    var links = document.querySelectorAll('.box05 a');
    
    links.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>

            // Xóa lớp 'active' từ tất cả các liên kết
            links.forEach(function(link) {
                link.classList.remove('active');
            });

            // Thêm lớp 'active' vào liên kết được nhấn
            this.classList.add('active');
        });
    });
});