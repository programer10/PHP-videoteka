<?php
$server  ='localhost';
$user    ='root';
$pass    ='';
$database='kolekcija';


$db=mysql_connect($server,$user,$pass);

if(!$db){
	echo "greska";
}
else{
	$db_selected=mysql_select_db($database,$db);
	if($db_selected){
		//echo "<br>uspjesno spojen na bazu kolekcija!";
	}
	else{
		echo "neuspješno spojen na bazu kolekcija!";
	}
}

?>