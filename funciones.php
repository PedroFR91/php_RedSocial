<?php
$dbhost='localhost';
$dbname='red';
$dbuser='root';
$dbpass='123456';

$connection= new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if($connection->connect_error) die("Fatal error");

function createTable($name,$query)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Tabla '$name' creada o existente<br>";
} 
function queryMysql($query)
{
    global $connection;
    $result=$connection->query($query);
    if(!$result) die ("fatal error");
    return $result;
}
