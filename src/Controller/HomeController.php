<?php

namespace App\Controller;

class HomeController {
    public function index() {
        include 'src/View/home/index.php'; // Inclusion de la vue index.php de la page d'accueil
    }
}
