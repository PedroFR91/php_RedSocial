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
function destroySession()
{
    $_SESSION=array();

    if(session_id() != || isset($_COOKIE[session_name()])){
        setcookie(session_name(),'',time()-2592000,'/');
    }
    session_destroy();
}
function sanitizeString($var)
{
    global $connection;
    $var =strip_tags($var);
    $var=htmlentities($var);
    if(get_magic_quotes_gpc()){
        $var=stripslashes($var);
    }
    return $connection->real_escape_string($var);
}