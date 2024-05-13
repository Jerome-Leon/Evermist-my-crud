<?php

namespace App\Controller;

use App\Model\CharacterModel;

class CharactersController {
    private $model;

    public function __construct() {
        $this->model = new CharacterModel(); // Instanciation du modèle CharacterModel
    }

    public function index() {
        $characters = $this->model->getAllCharacters(); // Récupération de tous les personnages depuis la base de données
        include 'src/View/characters/index.php'; // Inclusion de la vue index.php pour afficher les personnages
    }

    public function create() {
        include 'src/View/characters/create.php'; // Affichage du formulaire de création de personnage
    }
    
    public function store() {
        $errors = []; // Tableau pour stocker les messages d'erreur
        
        // Vérification si une image a été téléchargée
        if(isset($_FILES['fileToUpload'])) {
            $target_dir = "assets/images/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Vérification si le fichier existe déjà
            if (file_exists($target_file)) {
                // Ajoutez un message d'erreur au tableau
                $errors['file_exists'] = "Le fichier existe déjà.";
            } else {
                // Vérification si le fichier est une image réelle ou une fausse image
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check === false) {
                    // Gérer l'erreur si le fichier n'est pas une image
                    $errors['image'] = "Le fichier sélectionné n'est pas une image.";
                }

                // Vérification de la taille du fichier
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    // Gérer l'erreur si le fichier est trop volumineux
                    $errors['size'] = "Le fichier est trop volumineux.";
                }

                // Autoriser certains formats de fichiers
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    // Gérer l'erreur si le format de fichier n'est pas autorisé
                    $errors['format'] = "Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
                }

                // Déplacer le fichier téléchargé vers le dossier de destination
                if (empty($errors)) {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        // Le fichier a été téléchargé avec succès, vous pouvez maintenant récupérer le chemin de l'image
                        $portrait_path = $target_file;

                        // Maintenant, vous pouvez récupérer les autres données du formulaire
                        $name = $_POST['name'];
                        $attack = $_POST['attack'];
                        $defense = $_POST['defense'];
                        $hit_points = $_POST['hit_points'];
                        $max_hit_points = $_POST['max_hit_points'];

                        // Appeler la méthode du modèle pour ajouter le personnage avec le chemin de l'image à la base de données
                        $this->model->addCharacter($portrait_path, $name, $attack, $defense, $hit_points, $max_hit_points);

                        // Rediriger l'utilisateur vers une autre page, ici la liste des personnages
                        header('Location: /characters');
                        exit(); // Pour s'assurer d'arrêter l'exécution du script après la redirection
                    } else {
                        // Gérer l'erreur si le téléchargement du fichier a échoué
                        $errors['upload_error'] = "Une erreur s'est produite lors du téléchargement du fichier.";
                    }
                }
            }
        } else {
            // Gérer l'erreur si aucun fichier n'a été téléchargé
            $errors['no_file'] = "Veuillez sélectionner une image.";
        }

        // Réafficher le formulaire avec les erreurs
        include 'src/View/characters/create.php'; // Réaffichage du formulaire avec les messages d'erreur
    }
    
    public function edit($id) {
        $character = $this->model->getCharacterById($id); // Récupération d'un personnage par son ID depuis la base de données
        include 'src/View/characters/edit.php'; // Affichage du formulaire de modification de personnage
    }
    
    public function update() {
        $id = $_POST['id'];
        $portrait = $_POST['portrait'];
        $name = $_POST['name'];
        $attack = $_POST['attack'];
        $defense = $_POST['defense'];
        $hit_points = $_POST['hit_points'];
        $max_hit_points = $_POST['max_hit_points'];
        $this->model->updateCharacter($id, $portrait, $name, $attack, $defense, $hit_points, $max_hit_points);
        header('Location: /characters'); // Redirection vers la liste des personnages après la mise à jour
    }

    public function delete($id) {
        $this->model->deleteCharacter($id); // Suppression d'un personnage de la base de données par son ID
        header('Location: /characters'); // Redirection vers la liste des personnages après la suppression
    }
}
