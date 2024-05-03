<?php

namespace App\Controller;

use App\Model\CharacterModel;

class CharactersController {
    private $model;

    public function __construct() {
        $this->model = new CharacterModel();
    }

    public function index() {
        $characters = $this->model->getAllCharacters();
        include 'src/View/characters/index.php';
    }

    public function create() {
        include 'src/View/characters/create.php';
    }
    
    public function store() {
        $portrait = $_POST['portrait'];
        $name = $_POST['name'];
        $attack = $_POST['attack'];
        $defense = $_POST['defense'];
        $hit_points = $_POST['hit_points'];
        $max_hit_points = $_POST['max_hit_points'];
        $this->model->addCharacter($portrait, $name, $attack, $defense, $hit_points, $max_hit_points);
        header('Location: /characters');
    }
    
    public function edit($id) {
        $character = $this->model->getCharacterById($id);
        include 'src/View/characters/edit.php';
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
        header('Location: /characters');
    }

    public function delete($id) {
        $this->model->deleteCharacter($id);
        header('Location: /characters');
    }
}
