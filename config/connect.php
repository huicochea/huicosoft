<?php
include("config.php");
//$conn = mssql_connect($host_db,$usuario_db,$password_db);


$conn = new PDO('mysql:host=$host_db;dbname=$nombre_db', $usuario_db, $password_db);

/*
$conn = mysql_connect($host_db,$usuario_db,$password_db);

if(!($conn)){
    echo "<p>Connection to mysql via mssql failed: ".$conn;
    print_r($conn);
    echo "</p>\n";
}else{
    //mssql_select_db($nombre_db, $conn);
    mysql_select_db($nombre_db,$conn);

}
*/
?>