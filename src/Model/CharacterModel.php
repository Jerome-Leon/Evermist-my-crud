<?php

namespace App\Model;

use PDO;
use App\Model\Database;

class CharacterModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAllCharacters()
    {
        $stmt = $this->db->query("SELECT * FROM characters");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCharacter($portrait, $name, $attack, $defense, $hit_points, $max_hit_points)
    {
        $stmt = $this->db->prepare("INSERT INTO characters (portrait, name, attack, defense, hit_points, max_hit_points) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$portrait, $name, $attack, $defense, $hit_points, $max_hit_points]);
    }

    public function getCharacterById($id): array
    {
        $stmt = $this->db->prepare("SELECT * FROM characters WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCharacter($id, $portrait, $name, $attack, $defense, $hit_points, $max_hit_points)
    {
        $stmt = $this->db->prepare("UPDATE characters SET portrait = ?, name = ?, attack = ?, defense = ?, hit_points = ?, max_hit_points = ? WHERE id = ?");
        $stmt->execute([$portrait, $name, $attack, $defense, $hit_points, $max_hit_points, $id]);
    }
    public function

 deleteCharacter($id) {
    $stmt = $this->db->prepare("DELETE FROM characters WHERE id = ?");
    $stmt->execute([$id]);
}
}