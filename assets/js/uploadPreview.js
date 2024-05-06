// Cette fonction est appelée lorsqu'un utilisateur clique sur l'élément contenant l'image
function selectImage() {
    // Clique sur l'élément input de type fichier invisible pour ouvrir la fenêtre de sélection de fichier
    document.getElementById('fileToUpload').click();
}

// Cette fonction est appelée lorsque l'utilisateur sélectionne un fichier à partir de la fenêtre de sélection de fichier
function previewImage(input) {
    // Vérifie si des fichiers ont été sélectionnés et si le premier fichier a été sélectionné
    if (input.files && input.files[0]) {
        // Crée un objet FileReader pour lire le contenu du fichier
        var reader = new FileReader();

        // Cette fonction sera appelée lorsque la lecture du fichier sera terminée
        reader.onload = function(e) {
            // Met à jour la source de l'image sélectionnée avec les données de l'image chargée
            document.getElementById('selectedImage').src = e.target.result;
        }

        // Lit le contenu du fichier en tant que URL de données (base64)
        reader.readAsDataURL(input.files[0]);
    }
}
