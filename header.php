<nav>
    <ul>
        <li><a href="index.php">Accueil du Forum</a></li>
        <?php if(isset($_SESSION['user_id'])): ?>
            <li><a href="add_article.php">Rédiger un article</a></li>
            <li><a href="logout.php">Déconnexion (<?= htmlspecialchars($_SESSION['username']); ?>)</a></li>
        <?php else: ?>
            <li><a href="login.php">Connexion</a></li>
            <li><a href="register.php">Créer un compte</a></li>
        <?php endif; ?>
    </ul>
</nav>