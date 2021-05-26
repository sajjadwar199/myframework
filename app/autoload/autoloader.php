<?php
//استدعاء الملفات تلقائيا
 //اسم ملف المشروع $folderprojectName

 function my_autoload($class_name,$pathfolder='app/core/',$folderprojectName='myframework') {
    if (is_file( $_SERVER['DOCUMENT_ROOT'].'/'.$folderprojectName.'/'.$pathfolder. $class_name . '.php')) {
        require_once  $_SERVER['DOCUMENT_ROOT'].'/'.$folderprojectName.'/'.$pathfolder. $class_name . '.php';
    } else if (is_file('ADMIN/TPL/SOME_FOLDER2/' . $class_name . '.php')) {
        require_once 'ADMIN/TPL/SOME_FOLDER2/' . $class_name . '.php';
    }
}
spl_autoload_register("my_autoload");

//استدعاءكلاسات الموجودة فيcontrollels
function my_autoload2($class_name,$pathfolder='app/controllers/',$folderprojectName='myframework') {
     $folderproject='myframework';
    if (is_file( $_SERVER['DOCUMENT_ROOT'].'/'.$folderprojectName.'/'.$pathfolder. $class_name . '.php')) {
        require_once  $_SERVER['DOCUMENT_ROOT'].'/'.$folderprojectName.'/'.$pathfolder. $class_name . '.php';
    } else if (is_file('ADMIN/TPL/SOME_FOLDER2/' . $class_name . '.php')) {
        require_once 'ADMIN/TPL/SOME_FOLDER2/' . $class_name . '.php';
    }
}
spl_autoload_register("my_autoload2");
?>