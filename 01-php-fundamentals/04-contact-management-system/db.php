<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'contacts_db';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection Failed:  {$conn->connect_error}");
}