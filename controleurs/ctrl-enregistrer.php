<?php
$DateAndTime = date('Y-m-d h:i:s a', time());
require "modeles/ModeleSBAteliers.php" ;

	$civilite = $_POST[ "civilite" ] ;
	$nom = $_POST[ "nom" ] ;
	$prenom = $_POST[ "prenom" ] ;
	$naissance = $_POST[ "naissance" ] ;
	$email = $_POST[ "email" ] ;
	$mobile = $_POST[ "mobile" ] ;
	$ville = $_POST[ "ville" ] ;
	$mdp = $_POST[ "mdp" ] ;
	$cp = $_POST[ "cp" ];
	$adresse = $_POST[ "adresse" ] ;

	if(preg_match("/^(([0-9]){5})|(2A|2B)$/",$cp) and preg_match("/^[0-9]+([a-z éâèàäë]|[0-9 ])+$/",$adresse)){
		ModeleSBAteliers::enregistrerClient(
			$civilite ,
			$nom ,
			$prenom ,
			$naissance ,
			$email ,
			$mobile ,
			$adresse ,
			$cp ,
			$ville ,
			$mdp
		) ;
		header( "Location: /sbateliers" ) ;
	}else{
		echo "eror preg match";
	}
?>
