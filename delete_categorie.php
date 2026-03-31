<?php
include('config.php');

if (!isset($_GET['id'])) {
    echo "ID-ul categoriei nu a fost furnizat.";
    exit;
}

$id_categorie = $_GET['id'];

$sql = "DELETE FROM categorii WHERE ID_categorie = $id_categorie";

if ($conn->query($sql) === TRUE) {
    echo "Categoria a fost ștearsă cu succes!";
    header("Location: categorii.php");
    exit;
} else {
    echo "Eroare: " . $conn->error;
}
?>