<?php
spl_autoload_register(function($classname)
{
    $classname = str_replace("\\" , "/", $classname);
    var_dump($classname);
    require_once "./libraries/$classname.php";
})
?>