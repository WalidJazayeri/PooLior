<?php

/**
 * Rends l'affichage
 * @param string $path le chemin voulu
 * @param array $variables les variables necessaires à l'affichage
 *
 * @return void
 */
function render(string $path, array $variables = []):void
{
    extract($variables);

    ob_start();
    require('templates/'. $path .'.html.php');
    $pageContent = ob_get_clean();

    require('templates/layout.html.php');
}

/**
 * Redirige l'utilisateur
 */
function redirect(string $url): void
{
    header("Location: $url");
    exit();
}
?>