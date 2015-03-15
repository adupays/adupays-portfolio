<?php
/*
header('ICI TON HEADER'); //Forcer le download de la page
header('ICI TON HEADER'); //Dire que le fichier est un PDF // PAs certain lui
header('ICI TON HEADER'); //Lien vers le fichier
*/

header("Content-type: application/pdf");
header("Content-Disposition: attachment; cv_amandine_dupays=$_GET[pdf]");
readfile($_GET['pdf']);
?>