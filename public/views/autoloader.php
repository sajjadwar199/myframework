<?php
 function my_autoload($class_name,$pathfolder='../../app/core/') {
    if (is_file($pathfolder . $class_name . '.php')) {
        require_once $pathfolder . $class_name . '.php';
    } else if (is_file('ADMIN/TPL/SOME_FOLDER2/' . $class_name . '.php')) {
        require_once 'ADMIN/TPL/SOME_FOLDER2/' . $class_name . '.php';
    }
}
spl_autoload_register("my_autoload");


function my_autoload2($class_name,$pathfolder='../../app/controllers/') {
    if (is_file($pathfolder . $class_name . '.php')) {
        require_once $pathfolder . $class_name . '.php';
    } else if (is_file('ADMIN/TPL/SOME_FOLDER2/' . $class_name . '.php')) {
        require_once 'ADMIN/TPL/SOME_FOLDER2/' . $class_name . '.php';
    }
}
spl_autoload_register("my_autoload2");
?>