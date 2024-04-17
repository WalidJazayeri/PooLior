<?php
spl_autoload_register(function($classname)
{
    $classname = str_replace("\\" , "/", $classname);
    $classname = lcfirst($classname);
    require_once "./libraries/$classname.php";
})
?>