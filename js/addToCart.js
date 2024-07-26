function updateCount() {

    var countElement = document.getElementById('count');
    var currentCount = parseInt(countElement.innerHTML.replace(/\D/g, ''), 10);
    
    // Tăng giá trị số lượng lên 1
    currentCount += 1;
    
    // Cập nhật lại nội dung của thẻ <span> với giá trị mới
    countElement.innerHTML = currentCount;
    
    // Log giá trị mới ra console
    console.log(countElement.innerHTML);

    
}

// var countElement = document.getElementById('count').innerHTML.replace(/\D/g, '');
// console.log(countElement)
