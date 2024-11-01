document.addEventListener('DOMContentLoaded', function() {
    const sliderContent = document.querySelector('.slider-content-top-slide');
    const items = document.querySelectorAll('.slider-content-top-slide .item');
    const next = document.querySelector('#next');
    const prev = document.querySelector('#prev');
    const dots = document.querySelectorAll('.slider-content-bottom li');
    let currentIndex = 0;

    function showSlide(index) {
        items.forEach((item, i) => {
            if (i === index) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
        updateDots(index);
    }

    function updateDots(index) {
        dots.forEach((dot, i) => {
            if (i === index) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % items.length;
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
        showSlide(currentIndex);
    }

    next.addEventListener('click', nextSlide);
    prev.addEventListener('click', prevSlide);

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentIndex = index;
            showSlide(currentIndex);
        });
    });

    showSlide(currentIndex);
});


//-------------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function () {
    var links = document.querySelectorAll('.box05 a');

    links.forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>

            // Xóa lớp 'active' từ tất cả các liên kết
            links.forEach(function (link) {
                link.classList.remove('active');
            });

            // Thêm lớp 'active' vào liên kết được nhấn
            this.classList.add('active');
        });
    });
});