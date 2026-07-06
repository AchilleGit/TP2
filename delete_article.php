<?php require_once 'config.db.php'; if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }
$stmt = $pdo->prepare("DELETE FROM Forum WHERE id_article = ? AND id_utilisateur = ?");
$stmt->execute([$_GET['id'], $_SESSION['user_id']]);
header("Location: index.php"); exit();
?>