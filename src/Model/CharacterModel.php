<?php

namespace App\Model;

use PDO;
use App\Model\Database;

class CharacterModel
{
    private $db; // Propriété pour stocker l'instance de la base de données

    public function __construct()
    {
        $this->db = Database::getInstance(); // Récupération de l'instance unique de la base de données
    }

    public function getAllCharacters()
    {
        // Récupération de tous les personnages depuis la base de données
        $stmt = $this->db->query("SELECT * FROM characters");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCharacter($portrait, $name, $attack, $defense, $hit_points, $max_hit_points)
    {
        // Ajout d'un nouveau personnage dans la base de données
        $stmt = $this->db->prepare("INSERT INTO characters (portrait, name, attack, defense, hit_points, max_hit_points) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$portrait, $name, $attack, $defense, $hit_points, $max_hit_points]);
    }

    public function getCharacterById($id): array
    {
        // Récupération d'un personnage par son ID depuis la base de données
        $stmt = $this->db->prepare("SELECT * FROM characters WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCharacter($id, $portrait, $name, $attack, $defense, $hit_points, $max_hit_points)
    {
        // Mise à jour d'un personnage dans la base de données
        $stmt = $this->db->prepare("UPDATE characters SET portrait = ?, name = ?, attack = ?, defense = ?, hit_points = ?, max_hit_points = ? WHERE id = ?");
        $stmt->execute([$portrait, $name, $attack, $defense, $hit_points, $max_hit_points, $id]);
    }

    public function deleteCharacter($id)
    {
        // Suppression d'un personnage de la base de données par son ID
        $stmt = $this->db->prepare("DELETE FROM characters WHERE id = ?");
        $stmt->execute([$id]);
    }
}
