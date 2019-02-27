 <!DOCTYPE html>
<html>
<head>
	<title>Unos</title>


<style>
body 
{
	text-align: center;
    margin-left: auto;
    margin-right: auto;
}

table 
{

	text-align: center;
	margin-left: auto;
    margin-right: auto;
      
}
p 
{
	font-size: 40px;
	color: green;
}
a:link 
{
    text-decoration: none;
    margin-left: 5px;
	margin-right: 5px;
}
td
{
	font-size: 18px;
	border: 2px solid black;
	min-height: 100px;
	min-width: 100px;
	background-color:#C2D891;
	
}
th 
{
	font-size: 18px;
	border: 2px solid silver;
	background-color: #89C4B1;

}

</style>
</head>

<body>


<?php 

include ("db_connection.php");


function yearDropdown($startYear, $endYear, $id="year"){ 
    
    echo '<select id="'.$id.'" name="'.$id.'">'; 
          
           
        for ($i=$startYear;$i<=$endYear;$i++){ 
        echo '<option value="'.$i.'">'.$i.'</option>';     
        } 
      
    echo '</select>'; 
} 


if (isset($_GET['obrisi']))
{

    $id=$_GET['obrisi'];
    
    $query_load_by_id ='select slika from filmovi where id='.$id;
    $naziv_slike = mysql_query($query_load_by_id);
    $row=mysql_fetch_row($naziv_slike);
    
  $filePath = 'naslovnice/'.$row[0];
    if ( file_exists($filePath) ) 
    {  
    unlink($filePath);
    }
    else
    {
        echo 'datoteka ne postoji';
    }
    $query_delete='DELETE FROM filmovi WHERE ID='.$id;
    mysql_query($query_delete);
}


echo '<table style="margin-top: 65px;" >';
echo '<tr>';
echo '<form method="post" enctype="multipart/form-data" action="unos.php">';

echo '<td>Naslov filma:<br />';
echo '<input type="text" name="naslov" id="naslov" required></td>';

echo '<td>Žanr:<br />';


$select = mysql_query('Select id, naziv FROM zanr');

   echo '<SELECT id="zanr" name="zanr">';

   while($zanrovi = mysql_fetch_array($select))
   {
         echo '<OPTION value="'.$zanrovi['id'].'">';
         echo $zanrovi['naziv'];
         echo '</OPTION>';
   }  
   echo '</SELECT>';

echo '<td>Godina:<br />';
 
 yearDropdown(1900, 2015);  

echo '<td>Vrijeme trajanja:<br />';
echo '<input type="text" name="trajanje" id="trajanje" maxlength="3" required></td>';

echo '<td>Slika:<br />';
echo '<input type="file" name="slika" id="slika" required></td>';

echo '<td><button type="submit" value="Submit">Unesi</button></td>';
echo '</form>';
echo '</tr>';
echo '</table>';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$target_dir = "naslovnice/";
	$target_file = $target_dir . basename($_FILES["slika"]["name"]);
	move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file);

	$naslov = $_POST["naslov"];
	$trajanje = $_POST["trajanje"];
	$yearDropdown = $_POST["year"];
	$zanrId = $_POST["zanr"];
	
	$query_insert="INSERT INTO filmovi (naslov, id_zanr, godina, trajanje, slika) 
				   VALUES ('".$naslov."', '".$zanrId."', '".$yearDropdown."', '".$trajanje."', '".$_FILES["slika"]["name"]."')";

	echo '<p>Uspješno ste unijeli film u bazu!</p>';
	
	mysql_query($query_insert);

}

echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';


$query_tpl="SELECT slika, naslov, godina, trajanje, ID FROM filmovi ORDER BY naslov";


$result =mysql_query($query_tpl);

if($result){
	echo '<table>';
	echo '<tr>';
	echo '<th>Slika</th>';
	echo '<th>Naslov filma</th>';
	echo '<th>Godina</th>';
	echo '<th>Trajanje</th>';
	echo '<th>Akcija</th>';
	echo '</tr>';
	while($row=mysql_fetch_row($result))
	{
		echo '<tr>';
		echo '<td><img src="naslovnice/'.$row[0].'" height="220" width="150"></td>';
		echo '<td>'.$row[1].'</td>';
		echo '<td>'.$row[2].'</td>';
		echo '<td>'.$row[3].' min</td>';
		echo '<td>[<a href="unos.php?obrisi='.$row[4].'">Obriši</a>]</td>';
		echo '</tr>';
	}
	echo '</table>';
}

echo '<br />';

?>

<a href="index.php">Index</a>

</body>
</html>