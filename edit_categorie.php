<?php
include('config.php');

if (!isset($_GET['id'])) {
    echo "ID-ul categoriei nu a fost furnizat.";
    exit;
}

$id_categorie = $_GET['id'];
$sql = "SELECT * FROM categorii WHERE ID_categorie = $id_categorie";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Categoria nu a fost găsită.";
    exit;
}

$row = $result->fetch_assoc();

if (isset($_POST['update_categorie'])) {
    $denumire = $_POST['denumire'];
    $descriere = $_POST['descriere'];

    $sql_update = "UPDATE categorii SET Denumirea_categoriei = '$denumire', Descriere = '$descriere' WHERE ID_categorie = $id_categorie";

    if ($conn->query($sql_update) === TRUE) {
        echo "Categoria a fost actualizată cu succes!";
        header("Location: categorii.php"); 
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
    <title>Editare Categorie</title>
</head>
<body>

<h1>Editare Categorie</h1>

<form method="POST">
    <label for="denumire">Denumirea Categoriei:</label>
    <input type="text" name="denumire" value="<?php echo $row['Denumirea_categoriei']; ?>" required><br><br>

    <label for="descriere">Descriere:</label>
    <textarea name="descriere" required><?php echo $row['Descriere']; ?></textarea><br><br>

    <button type="submit" name="update_categorie">Actualizează Categorie</button>
</form>

</body>
</html>