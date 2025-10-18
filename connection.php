<?php
// Configurer les informations de connexion � la base de donn�es
$host = 'localhost';
$db = 'vision';
$user = 'root';
$password = '';

// Cr�er la connexion
$conn = new mysqli($host, $user, $password, $db);

// V�rifier la connexion
if ($conn->connect_error) {
    die("Connexion �chou�e : " . $conn->connect_error);
}
?>
