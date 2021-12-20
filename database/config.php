<?php

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
$active_group = 'default';
$query_builder = TRUE;

// Connect to DB
$mysqli = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

// $currency = '$';
// $db_username = 'root';
// $db_password = '';
// $db_name = 'bolt';
// $db_host = 'localhost';
// $mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
