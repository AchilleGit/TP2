<?php require_once 'config.db.php'; include 'header.php'; ?>
<div class="container">
    <h1>Articles du Forum</h1>
    <?php
    $stmt = $pdo->query("SELECT f.*, u.nom FROM Forum f JOIN Utilisateur u ON f.id_utilisateur = u.id_utilisateur ORDER BY f.date_publication DESC");
    $articles = $stmt->fetchAll();
    foreach($articles as $article):
    ?>
        <div class="article">
            <h3><?= htmlspecialchars($article['titre']); ?></h3>
            <div class="article-meta">Écrit par <?= htmlspecialchars($article['nom']); ?> le <?= date('d/m/Y H:i', strtotime($article['date_publication'])); ?></div>
            <p><?= nl2br(htmlspecialchars($article['article'])); ?></p>
            
            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $article['id_utilisateur']): ?>
                <div class="actions">
                    <a href="edit_article.php?id=<?= $article['id_article']; ?>" class="btn-warning">Modifier</a>
                    <a href="delete_article.php?id=<?= $article['id_article']; ?>" class="btn-danger" onclick="return confirm('Supprimer cet article ?');">Supprimer</a>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>