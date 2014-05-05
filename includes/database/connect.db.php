<?php

define('DB_HOST','localhost');
define('DB_USER','u223229181_root');
define('DB_PASS','123456');
define('DB_NAME','u223229181_chat');
/*
if($connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)){
	echo 'Connected to Databases Server...<br /> ';
} else {
	echo 'Unable to connect to MySQL server.<br />';
}*/

require('mysqli.php');
// require('sqlite3.php');
// $db = new connectDB;