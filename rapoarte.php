<?php
include('config.php');

$sql = "SELECT categorii.Denumirea_categoriei, produse.Denumirea_produsului, produse.Pret, produse.Cantitate FROM produse INNER JOIN categorii ON produse.ID_categorie = categorii.ID_categorie ORDER BY categorii.Denumirea_categoriei";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Raport Produse pe Categorii</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

<h1>Produse pe Categorii</h1>

<table border="1">
    <tr>
        <th>Categorie</th>
        <th>Produs</th>
        <th>Preț</th>
        <th>Cantitate</th>
    </tr>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['Denumirea_categoriei'] . "</td>
                <td>" . $row['Denumirea_produsului'] . "</td>
                <td>" . $row['Pret'] . "</td>
                <td>" . $row['Cantitate'] . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>Nu există produse.</td></tr>";
}
?>

</table>
<a class="asd" href="index.php">Acasa</a>

</body>
</html>
