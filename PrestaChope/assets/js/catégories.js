
const addButton = document.querySelector('#btnAdd');
const div = document.querySelector('#sousCaté');
let numChild = div.childElementCount;
addButton.addEventListener('click', () => {
    if (numChild < 10) {
        let input1 = document.createElement("input");
        input1.type = 'text';
        input1.name = 'sousCaté[]';
        input1.placeholder='Nouvelle sous-catégorie';
        div.appendChild(input1);
        
        let input2 = document.createElement("input");
        input2.type = 'hidden';
        input2.name = 'idSousCaté[]';
        input2.value='0';
        div.appendChild(input2);
        
        numChild+=2;
    } 
    else if(numChild>=10){
        addButton.style.display = 'none';
    }
});