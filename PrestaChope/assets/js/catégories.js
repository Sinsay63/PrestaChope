let lien = window.location.href;
let url = new URL(lien);
let page = url.searchParams.get("page");



if (page ==='modifCatégorie') {
    const addButton = document.querySelector('#btnAdd');
    const div = document.querySelector('#sousCaté');
    let numChild = div.childElementCount;

    addButton.addEventListener('click', () => {
        if (numChild < 10) {
            let input1 = document.createElement("input");
            input1.type = 'text';
            input1.name = 'sousCaté[]';
            input1.placeholder = 'Nouvelle sous-catégorie';
            div.appendChild(input1);

            let input2 = document.createElement("input");
            input2.type = 'hidden';
            input2.name = 'idSousCaté[]';
            input2.value = '0';
            div.appendChild(input2);

            numChild += 2;
        } else if (numChild >= 10) {
            addButton.style.display = 'none';
        }
    });
}

else if (page === 'créationCatégorie') {
    const buttonAdd = document.querySelector('#buttonAdd');
    const div2 = document.querySelector('#sousCaté2');
    let numChild2 = div2.childElementCount;

    buttonAdd.addEventListener('click', () => {
        if (numChild2 < 5) {
            let input1 = document.createElement("input");
            input1.type = 'text';
            input1.name = 'sousCaté[]';
            input1.placeholder = 'Nouvelle sous-catégorie';
            div2.appendChild(input1);

            numChild2++;
        } else if (numChild2 >= 5) {
            buttonAdd.style.display = 'none';
        }

    });



}





