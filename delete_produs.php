<?php
include('config.php');
if (!isset($_GET['id'])) {
    echo "ID-ul produsului nu a fost furnizat.";
    exit;
}

$id_produs = $_GET['id'];

$sql = "DELETE FROM produse WHERE ID_produs = $id_produs";

if ($conn->query($sql) === TRUE) {
    echo "Produsul a fost ștearsă cu succes!";
    header("Location: produse.php"); 
    exit;
} else {
    echo "Eroare: " . $conn->error;
}
?>