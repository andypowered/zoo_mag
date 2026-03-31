<?php
include('config.php');
if (!isset($_GET['id'])) {
    echo "ID-ul produsului nu a fost furnizat.";
    exit;
}

$id_produs = $_GET['id'];

$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Produsul nu a fost găsit.";
    exit;
}

$row = $result->fetch_assoc();

$categories_sql = "SELECT * FROM categorii";
$categories_result = $conn->query($categories_sql);

if (isset($_POST['update_produs'])) {
    $denumire = $_POST['denumire'];
    $pret = $_POST['pret'];
    $cantitate = $_POST['cantitate'];
    $producator = $_POST['producator'];
    $id_categorie = $_POST['id_categorie'];

    $sql_update = "UPDATE produse SET Denumirea_produsului = '$denumire', Pret = $pret, Cantitate = $cantitate, Producator = '$producator', ID_categorie = $id_categorie WHERE ID_produs = $id_produs";

    if ($conn->query($sql_update) === TRUE) {
        echo "Produsul a fost actualizat cu succes!";
        header("Location: produse.php");
        exit;
    } else {
        echo "Eroare: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Editare Produs</title>
</head>
<body>

<h1>Editare Produs</h1>

<form method="POST">
    <label for="denumire">Denumirea Produsului:</label>
    <input type="text" name="denumire" value="<?php echo $row['Denumirea_produsului']; ?>" required><br><br>

    <label for="pret">Preț:</label>
    <input type="number" step="0.01" name="pret" value="<?php echo $row['Pret']; ?>" required><br><br>

    <label for="cantitate">Cantitate:</label>
    <input type="number" name="cantitate" value="<?php echo $row['Cantitate']; ?>" required><br><br>

    <label for="producator">Producător:</label>
    <input type="text" name="producator" value="<?php echo $row['Producator']; ?>" required><br><br>

    <label for="id_categorie">Categorie:</label>
    <select name="id_categorie" required>
        <?php
        while ($cat_row = $categories_result->fetch_assoc()) {
            $selected = ($row['ID_categorie'] == $cat_row['ID_categorie']) ? 'selected' : '';
            echo "<option value='" . $cat_row['ID_categorie'] . "' $selected>" . $cat_row['Denumirea_categoriei'] . "</option>";
        }
        ?>
    </select><br><br>

    <button type="submit" name="update_produs">Actualizează Produs</button>
</form>

</body>
</html>