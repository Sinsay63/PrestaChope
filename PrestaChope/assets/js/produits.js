function redirige(myvalue) {
    if (myvalue > 0) {
        window.location.assign("index.php?page=créationProduit&cat=" + myvalue);
    } 
    else {
        window.location.assign("index.php?page=créationProduit");
    }
}

