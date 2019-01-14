<?php

header("Access-Control-Allow-Origin: *");

require_once("inc/connectDB.php");
require_once("inc/sql.php");
// Require our Event class and datetime utilities
require dirname(__FILE__) . '/utils.php';

if (isset($_POST['submit'])){
$room = $_POST['room'];
$teacher = $_POST['teacher'];
$class = $_POST['class'];
$formato = 'Y-m-d H:i:s';   
$time =  $_POST['time'];    
$date = date_create($time);
echo date_format($date, 'Y-m-d H:i:s');
$starttime = date_format($date, 'Y-m-d H:i:s');
$result = createEvent($conn, $room, $teacher, $class, $starttime);
if($result===1)
    echo "YES";
else 
    echo "XREN";

} else {
    echo "XREN2";
    
    
}

?>