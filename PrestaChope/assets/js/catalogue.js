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