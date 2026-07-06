<?php require_once 'config.db.php'; if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }
include 'header.php';
$stmt = $pdo->prepare("SELECT * FROM Forum WHERE id_article = ? AND id_utilisateur = ?");
$stmt->execute([$_GET['id'], $_SESSION['user_id']]); $article = $stmt->fetch();
if(!$article) { die("Article introuvable ou vous n'avez pas la permission de le modifier."); }
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE Forum SET titre = ?, article = ? WHERE id_article = ?");
    $stmt->execute([$_POST['titre'], $_POST['article'], $_GET['id']]);
    header("Location: index.php"); exit();
}
?>
<div class="container">
    <h2>Modifier l'article</h2>
    <form method="POST">
        <div class="form-group"><label>Titre :</label><input type="text" name="titre" value="<?= htmlspecialchars($article['titre']); ?>" required></div>
        <div class="form-group"><label>Article :</label><textarea name="article" rows="10" required><?= htmlspecialchars($article['article']); ?></textarea></div>
        <button type="submit">Modifier</button>
    </form>
</div>