INSERT INTO characters (portrait, name, attack, defense, hit_points, max_hit_points)
VALUES 
('./assets/images/Ling_Yao.png', 'Ling Yao', 10, 5, 80, 80),
('./assets/images/Buddy_Thornwall.png', 'Buddy Thornwall', 8, 6, 120, 120),
('./assets/images/John_Warden.png', 'John Warden', 11, 3, 90, 90),
('./assets/images/Nina_Caillebotte.png', 'Nina Cailebotte', 7, 7, 83, 83),
('./assets/images/Luis_Delgado.png', 'Luis Delgado', 5, 7, 70, 70),
('./assets/images/Deborah_Rider.png', 'Deborah Rider', 11, 4, 95, 95),
('./assets/images/Bazim_Ghazam.png', 'Bazim Gazham', 6, 9, 89, 89),
('./assets/images/Magdalene_Schäfer.png', 'Magdalene Schäfer', 7, 6, 85, 85),
('./assets/images/Sam_Dover.png', 'Sam Dover', 8, 7, 100, 100),
('./assets/images/Sairo_Yanada.png', 'Saïro Yanada', 9, 7, 110, 110);


INSERT INTO equipments (name, type, attack_bonus, defense_bonus)
VALUES 
('Sabre de Mornedune', 'Arme', 10, 0),
('Bouclier de Sinréa', 'Bouclier', 0, 10),
('Bottes d''Orfeuille', 'Armure', 0, 5),
('Bottes d''Agilité', 'Armure', 5, 0),
('Arc de chêne gris', 'Arme', 8, 0),
('Robe de voyage', 'Armure', 0, 8),
('Amulette de Protection', 'Accessoire', 0, 7),
('Gantelets de Loï Fang', 'Armure', 7, 0),
('Anneau de Vitalité', 'Accessoire', 0, 4),
('Dague de Corbel', 'Arme', 6, 0),
('Plastron de Mailles', 'Armure', 0, 6),
('Pendentif de nacre', 'Accessoire', 0, 5),
('Hache du loup', 'Arme', 12, 0),
('Armure de Plaque', 'Armure', 0, 12),
('Cape de rôdeur', 'Accessoire', 0, 7),
('Bâton de Hautefaille', 'Arme', 5, 5),
('Bracelets de Cuir', 'Armure', 0, 4),
('Pendentif de Force', 'Accessoire', 0, 3),
('Marteau de Fort-Brooks', 'Arme', 9, 0),
('Gants de marin', 'Gants', 4, 0);



CREATE TABLE characters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    portrait VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    attack INT NOT NULL,
    defense INT NOT NULL,
    hit_points INT NOT NULL,
    max_hit_points INT NOT NULL
);


CREATE TABLE equipments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    type VARCHAR(50) NOT NULL,
    attack_bonus INT,
    defense_bonus INT
);


CREATE TABLE character_equipment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    character_id INT,
    equipment_id INT,
    FOREIGN KEY (character_id) REFERENCES characters(id),
    FOREIGN KEY (equipment_id) REFERENCES equipments(id)
);
