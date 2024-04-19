const placeholder = 'https://marcolanci.it/boolean/assets/placeholder.png'
const imageFiels = document.getElementById('image')
const previewField = document.getElementById('preview')

let blobUrl;

const changeImageButton = document.getElementById('change-image-button')
const previousImageFiled = document.getElementById('previous-image-field')

// # Gestione preview immagine

imageFiels.addEventListener('change', () => {
    //controllo se ho file (se hai files e hai il primo)
    if (imageFiels.files && imageFiels.files[0]) {
        //prendo il file
        const file = imageFiels.files[0];
        //preparo un url temporaneo
        blobUrl = URL.createObjectURL(file);
        //Lo inserisco nelll'src
        previewField.src = blobUrl;
    }

    else {
        previewField.src = previewField;
    }

});

window.addEventListener('beforeunload', ()=>{
    if(blobUrl) URL.revokeObjectURL(blobUrl)
})

// # Gestione campo file

changeImageButton.addEventListener('click', ()=>{
    previousImageFiled.classList.add('d-none');
    imageFiels.classList.remove('d-none');
    previewField.src = placeholder ;
    imageFiels.click();
})

