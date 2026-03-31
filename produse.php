<?php
include('config.php');
$sql = "SELECT produse.*, categorii.Denumirea_categoriei FROM produse LEFT JOIN categorii ON produse.ID_categorie = categorii.ID_categorie";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="ro">
    
<head>
    <meta charset="UTF-8">
    <title>Gestionare Produse</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<h1>Gestionare Produse</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Denumire</th>
        <th>Preț</th>
        <th>Cantitate</th>
        <th>Producător</th>
        <th>Categorie</th>
        <th>Acțiuni</th>
    </tr>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['ID_produs'] . "</td>
                <td>" . $row['Denumirea_produsului'] . "</td>
                <td>" . $row['Pret'] . "</td>
                <td>" . $row['Cantitate'] . "</td>
                <td>" . $row['Producator'] . "</td>
                <td>" . $row['Denumirea_categoriei'] . "</td>
                <td>
                    <a  href='edit_produs.php?id=" . $row['ID_produs'] . "'>Editează</a> |
                    <a  href='delete_produs.php?id=" . $row['ID_produs'] . "' onclick='return confirmDelete()'>Șterge</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>Nu există produse înregistrate.</td></tr>";
}

?>

</table>
<a class="asd" href="index.php">Acasa</a>

</body>
<script>
        function confirmDelete() {
            return confirm("Sunteți sigur că doriți să ștergeți acest produs?");
        }
    </script>
</html>