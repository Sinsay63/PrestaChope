function hideThis(_div, _btn, title) {
    const obj = document.getElementById(_div);
    const obj2 = document.getElementById(_btn);
    const obj3 = document.getElementById(title);
    if (obj.style.display === "block") {
        obj.style.display = "none";
    } 
    else {
        obj.style.display = "block";
        obj2.style.display = "none";
        obj3.style.display = "none";
    }
}

function redirige(myvalue) {
    if (myvalue > 0) {
        window.location.assign("index.php?page=catalogue&cat=" + myvalue);
    } 
    else {
        window.location.assign("index.php?page=catalogue");
    }
}
function redirige2(myvalue, id) {
    window.location.assign("index.php?page=catalogue&cat=" + id + "&souscat=" + myvalue);
}