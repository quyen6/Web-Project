
var productContainer = document.getElementById('productContainer');
var products = productContainer.getElementsByClassName('product-link');

function sortProducts(order) {
    // Chuyển đổi HTMLCollection thành mảng
    var productsArray = Array.from(products);
    productsArray.sort(function (a, b) {
        var priceA = parseFloat(a.querySelector('.price').innerText.split(' ')[0].replace(/[^\d]/g, ''));
        var priceB = parseFloat(b.querySelector('.price').innerText.split(' ')[0].replace(/[^\d]/g, ''));
        if (order) {    
            return priceA - priceB;
        } else {
            return priceB - priceA;
        }
    });
    productsArray.forEach(function (product) {
        productContainer.appendChild(product);
    });
}
document.getElementById('sortLowToHigh').onclick = function () {
    sortProducts(true);
};

document.getElementById('sortHighToLow').onclick = function () {
    sortProducts(false);
};


// document.addEventListener("DOMContentLoaded", function() {
//     const filterButton = document.getElementById("ramFilterButton");
//     const filterDropdown = document.getElementById("ramDropdown");

//     filterButton.addEventListener("click", function() {
//         filterDropdown.classList.toggle("show");
//     });

//     window.addEventListener("click", function(event) {
//         if (!event.target.matches('.btn-filter')) {
//             if (filterDropdown.classList.contains('show')) {
//                 filterDropdown.classList.remove('show');
//             }
//         }
//     });
// });



document.addEventListener("DOMContentLoaded", function() {
    const filterButtons = document.querySelectorAll(".btn-filter");
    const filterDropdowns = document.querySelectorAll(".filter-dropdown");

    filterButtons.forEach(button => {
        button.addEventListener("click", function(event) {
            const dropdown = button.nextElementSibling;

            filterDropdowns.forEach(d => {
                if (d !== dropdown) {
                    d.classList.remove("show");
                }
            });

            dropdown.classList.toggle("show");
            event.stopPropagation();
        });
    });

    window.addEventListener("click", function() {
        filterDropdowns.forEach(dropdown => {
            if (dropdown.classList.contains("show")) {
                dropdown.classList.remove("show");
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const sortButtons = document.querySelectorAll(".filter-sort_list-filter .btn-filter");
    sortButtons.forEach(button => {
        button.addEventListener("click", function() {
            sortButtons.forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");
        });
    });
});

