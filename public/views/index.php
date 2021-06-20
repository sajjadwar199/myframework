<?php
include '../../app/autoload/autoloader.php';
$core=new core;
$core->formStart('index.php');
$core->radioInput("rdrd",['apple','banana','tee'],'required');
$core->formEnd();
 ?>
 