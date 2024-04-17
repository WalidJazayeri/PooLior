<?php
spl_autoload_register(function($classname)
{
    var_dump($classname);
    $classname = str_replace("\\" , DIRECTORY_SEPARATOR, $classname);
    var_dump($classname);
    require_once "./libraries/$classname.php";
})
?>