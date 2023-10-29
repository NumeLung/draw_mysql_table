<?php
const HOST = "127.0.0.1";
const DBUSER = "root";
const DBPASS = "";
$dbname = $_POST['dbname'];
$CONN = new mysqli(HOST, DBUSER, DBPASS, $dbname);
