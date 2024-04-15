<?php
require_once './libraries/database.php';


//1. Connexion à la base de données avec PDO

$pdo = getPdo();



/**
 * 2. Récupération des articles
 */
// On utilisera ici la méthode query (pas besoin de préparation car aucune variable n'entre en jeu)
$resultats = $pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
// On fouille le résultat pour en extraire les données réelles
$articles = $resultats->fetchAll();

/**
 * 3. Affichage
 */
$pageTitle = "Accueil";
ob_start();
require('templates/articles/index.html.php');
$pageContent = ob_get_clean();

require('templates/layout.html.php');
