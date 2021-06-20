<?php
include '../../app/autoload/autoloader.php';
$core=new core;
 $core->formStart("index.php?id=2");
 $core->textInput('a','اسم');
 $core->numberInput('b','رقم');
 $core->emailInput('email','البريد الألكتروني');
 $core->buttonSubmit('send','ارسال');
 $core->formEnd();
 ?>
 