const check = document.querySelectorAll(".checkbox");

check.forEach((box) => {

    box.addEventListener('change', () => {
        const id = box.getAttribute("value");
        if (box.checked) {
            window.location.href = 'index.php?page=messages&viewed=1&id=' + id;
        } 
        else{
            window.location.href = 'index.php?page=messages&viewed=2&id=' + id;
        }
    });

});
