<?php
include('config.php');

$sql = "SELECT * FROM categorii";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Gestionare Categorii</title>
    <link rel="stylesheet" href="css.css">
</head>

<h1>Gestionare Categorii</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Denumire</th>
        <th>Descriere</th>
        <th>Acțiuni</th>
    </tr>
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['ID_categorie'] . "</td>
                <td>" . $row['Denumirea_categoriei'] . "</td>
                <td>" . $row['Descriere'] . "</td>
                <td>
                    <a href='edit_categorie.php?id=" . $row['ID_categorie'] . "'>Editează</a> |
                    <a href='delete_categorie.php?id=" . $row['ID_categorie'] . "' onclick='return confirmDelete()'>Șterge</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>Nu există categorii înregistrate.</td></tr>";
}
?>
</table>
<a class="asd" href="index.php">Acasa</a>

</body>
<script>
        function confirmDelete() {
            return confirm("Sunteți sigur că doriți să ștergeți această categorie?");
        }
    </script>
</html>