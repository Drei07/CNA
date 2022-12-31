<?php
	try {

		// Localhost
		$pdoConnect = new PDO("mysql:host=localhost;dbname=cna", "root", "");

		// Live
		// $pdoConnect = new PDO("mysql:host=localhost;dbname=u867039073_dhvsu_cna", "u867039073_dhvsu_cna", "Dhvsucna2022");

		$pdoConnect->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

	}
	catch (PDOException $exc){
		echo $exc -> getMessage();
	}
    catch (PDOException $exc){
        echo $exc -> getMessage();
    exit();
    }
?>