<?php
	$DateAndTime = date('Y-m-d h:i:s a', time());
	require "modeles/ModeleSBAteliers.php" ;
	try{
		$ateliers = ModeleSBAteliers::getAteliersProgrammes();
		require "vues/vue-ateliers-programmes.php" ;
	}catch(PDOException $e){
		$fl = fopen("/var/log/sbateliers/access.log", "a");
		$messageV = "@" . $_SERVER['REMOTE_ADDR']
			. " " . $DateAndTime
			. " " . " Erreur SGBDR Visu Ateliers "
			. " " . $e->getMessage()
			. " " . $e->getFile()
			. " " . $e->getLine()
			. " " . $_SERVER['HTTP_USER_AGENT']
			. "\n";
		fwrite($fl,$messageV);
		fclose($fl);
		echo 'erreur ateliers programmés </br>';
		require "vues/vue-espace-client.php";
	}

?>
