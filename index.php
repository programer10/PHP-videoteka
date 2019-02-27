<!DOCTYPE html>
<html>
<head>
	<title>Kolekcija filmova</title>

<style>
body {
	text-align: center;
    margin-left: auto;
    margin-right: auto;
}
table {

	text-align: center;
	margin-left: auto;
    margin-right: auto;
}
p {
	font-size: 50px;

}
a:link {
    text-decoration: none;
    margin-left: 5px;
	margin-right: 5px;
}
td {
	font-size: 20px;
	font-style: bold;
}
</style>

</head>
<body>


<?php

include ("db_connection.php");


	echo '<p>';
	echo '|';
	echo '<a href="index.php?slovo=A">A</a>';
	echo '|';
	echo '<a href="index.php?slovo=B">B</a>';
	echo '|';
	echo '<a href="index.php?slovo=C">C</a>';
	echo '|';
	echo '<a href="index.php?slovo=D">D</a>';
	echo '|';
	echo '<a href="index.php?slovo=E">E</a>';
	echo '|';
	echo '<a href="index.php?slovo=F">F</a>';
	echo '|';
	echo '<a href="index.php?slovo=G">G</a>';
	echo '|';
	echo '<a href="index.php?slovo=H">H</a>';
	echo '|';
	echo '<a href="index.php?slovo=I">I</a>';
	echo '|';
	echo '<a href="index.php?slovo=J">J</a>';
	echo '|';
	echo '<a href="index.php?slovo=K">K</a>';
	echo '|';
	echo '<a href="index.php?slovo=L">L</a>';
	echo '|';
	echo '<a href="index.php?slovo=M">M</a>';
	echo '|';
	echo '<a href="index.php?slovo=N">N</a>';
	echo '|';
	echo '<a href="index.php?slovo=O">O</a>';
	echo '|';
	echo '<a href="index.php?slovo=P">P</a>';
	echo '|';
	echo '<a href="index.php?slovo=R">R</a>';
	echo '|';
	echo '<a href="index.php?slovo=S">S</a>';
	echo '|';
	echo '<a href="index.php?slovo=T">T</a>';
	echo '|';
	echo '<a href="index.php?slovo=U">U</a>';
	echo '|';
	echo '<a href="index.php?slovo=V">V</a>';
	echo '|';
	echo '<a href="index.php?slovo=Z">Z</a>';
	echo '|';
	echo '</p>';



if (isset($_GET['slovo'])) {
	
	$slovo=$_GET['slovo'];

	$query_tpl="SELECT slika, naslov, godina, trajanje FROM filmovi WHERE naslov LIKE '".$slovo."%' ORDER BY naslov";


  $result =mysql_query($query_tpl);
  $num_results = mysql_num_rows($result); 
   
    if ($num_results > 0){ 

        echo '<table>';
        while($row=mysql_fetch_row($result)){
            echo '<tr>';
            echo '<td><img src="naslovnice/'.$row[0].'" height="200" width="140"></td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>'.$row[1].' ('.$row[2].')</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>Trajanje: '.$row[3].' min</td>';
            echo '</tr>';
        }
        echo '</table>';

        
    }else{
        echo '<table>';
        echo '<tr>';
        echo '<td>Nema ni jednog filma pod odabranim početnim slovom!</td>';
        echo '</tr>';
        echo '</table>';
    }

	

}

echo '<br />';

?>

<a href="unos.php">Unos</a>


</body>
</html>

