const placeholder = 'https://marcolanci.it/boolean/assets/placeholder.png'
const imageField = document.getElementById('cover_image')
const previewField = document.getElementById('preview')

let blobUrl;

const changeImageButton = document.getElementById('change-cover_image-button')
const previousImageFiled = document.getElementById('previous-cover_image-field')

// # Gestione preview immagine

imageField.addEventListener('change', () => {
    //controllo se ho file (se hai files e hai il primo)
    if (imageField.files && imageField.files[0]) {
        //prendo il file
        const file = imageField.files[0];
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
    imageField.classList.remove('d-none');
    previewField.src = placeholder ;
    imageField.click();
})

