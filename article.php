<?php
require_once './libraries/database.php';
require_once './libraries/utils.php';


/**
 * 1. Récupération du param "id" et vérification de celui-ci
 */
// On part du principe qu'on ne possède pas de param "id"
$article_id = null;

// Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $article_id = $_GET['id'];
}

// On peut désormais décider : erreur ou pas ?!
if (!$article_id) {
    die("Vous devez préciser un paramètre `id` dans l'URL !");
}

//  3. Récupération de l'article en question

$article = findArticle($article_id);

/**
 * 4. Récupération des commentaires de l'article en question
 * Pareil, toujours une requête préparée pour sécuriser la donnée filée par l'utilisateur (cet enfoiré en puissance !)
 */
$commentaires = findAllComents($article_id);

/**
 * 5. On affiche
 */
$pageTitle = $article['title'];
render('articles/show', compact('pageTitle', 'article', 'commentaires', 'article_id'));
