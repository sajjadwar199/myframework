<?php
include '../../app/autoload/autoloader.php';
$user=new user ;
$user->masterPageStart();

?>

<br>

<?php
$user->content();
?>
<?php $user->masterPageEnd(); ?>