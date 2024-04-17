<?php
namespace Utils;
Class Http
{
        /**
     * Redirige l'utilisateur
     */
    public static function redirect(string $url): void
    {
        header("Location: $url");
        exit();
    }
}
?>