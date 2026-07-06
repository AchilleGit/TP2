<?php require_once 'config.db.php'; if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }
include 'header.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("INSERT INTO Forum (id_utilisateur, titre, article) VALUES (?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $_POST['titre'], $_POST['article']]);
    header("Location: index.php"); exit();
}
?>
<div class="container">
    <h2>Rédiger un article</h2>
    <form method="POST">
        <div class="form-group"><label>Titre :</label><input type="text" name="titre" required></div>
        <div class="form-group"><label>Article :</label><textarea name="article" rows="10" required></textarea></div>
        <button type="submit">Publier</button>
    </form>
</div>