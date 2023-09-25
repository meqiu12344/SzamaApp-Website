function updateFileName(input) {
    const fileNameField = document.getElementById('file-name');
    const fileName = input.files[0].name;

    if (fileName) {
        fileNameField.classList.add("selected");
        fileNameField.textContent = fileName;
        
    } else {
        fileNameField.classList.add("selected");
        fileNameField.textContent = 'Upload photo';
    }
}

function add_input(type, text, for_label){
    const container = document.getElementById(type);
    const addIngredientButton = document.getElementById('addIngredient');
    const allLabels = document.querySelectorAll("." + type + " label");

    var i = 1;

    allLabels.forEach(element => {
        i++;
    });

    const newLabel = document.createElement('label');
    const newInput = document.createElement('input');
    const newI = document.createElement('i');

    newI.classList.add('bi-trash');

    newLabel.appendChild(newInput);
    newLabel.appendChild(newI);
    newLabel.setAttribute('for', for_label + i);

    newInput.type = 'text';
    newInput.placeholder = text +" "+ i;
    newInput.setAttribute('id', for_label + i)
    newInput.setAttribute('name', for_label + i)
    newInput.setAttribute('required', "")

    container.insertBefore(newLabel, addIngredientButton);

    check_inputs_null();
}

const body = document.getElementById('body');

function get_trash_icons(){
    const trashIcons = document.querySelectorAll('.bi-trash');

    trashIcons.forEach(icon => {
        icon.addEventListener('click', () => {
            const label = icon.closest('label');
    
            if (label) {
                parentNode = label.parentNode;
            
                
                label.remove();
                update_iteratore(parentNode.getAttribute('id'));
                
            }

            check_inputs_null();
        });
    });
}


function update_iteratore(type){
    if(type === "ingredients"){

        const inputs = document.querySelectorAll("#"+ type + " > label");

        var i = 1;

        inputs.forEach(label =>{
            label.setAttribute('for', "skladnik" + i)
            let input = label.querySelector("input")

            input.setAttribute('name', "skladnik" + i);
            input.setAttribute('id', 'skladnik' + i);
            input.setAttribute('placeholder', 'Składnik ' + i);

            i++
        })

    }else if (type === "preparation"){

        const inputs = document.querySelectorAll("#"+ type + " > label");

        var i = 1;

        inputs.forEach(label =>{
            label.setAttribute('for', "krok" + i)
            let input = label.querySelector("input")

            input.setAttribute('name', "krok" + i);
            input.setAttribute('id', 'krok' + i);
            input.setAttribute('placeholder', 'Krok ' + i);

            i++
        })
    }
}


function check_inputs_null(){
    var button = document.getElementById('submit');

    var ingredients_div = document.getElementById('ingredients');
    var ingredients_labels = ingredients_div.querySelectorAll('label');

    var preparation_div = document.getElementById('preparation');
    var preparation_labels = preparation_div.querySelectorAll('label');

    if(ingredients_labels.length === 0 || preparation_labels.length === 0){
        button.setAttribute('disabled', 'true');
        button.value = "Nie można dodać przepisu";

    }else{
        button.removeAttribute('disabled')
        button.value = "Udostępnij";
    }
}