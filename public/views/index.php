<?php
include '../../app/autoload/autoloader.php';
$core=new core;
 $core->formStart("index.php");
 $core->textInput('a','اسم');
 $core->numberInput('b','رقم');
 $core->numberInput('c','رقم الهاتف');
 $core->emailInput('email','البريد الألكتروني');
 $core->radioInput('see',['الاسم'=>'2','العمر'=>'432'],'الرجاء اختيار');
 $core->buttonSubmit('send','ارسال');
 $core->formEnd();
 ?>
 