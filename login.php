<?php require_once 'config.db.php'; include 'header.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM Utilisateur WHERE nom_utilisateur = ?");
    $stmt->execute([$_POST['nom_utilisateur']]); $user = $stmt->fetch();
    if($user && password_verify($_POST['mot_de_passe'], $user['mot_de_passe'])) {
        $_SESSION['user_id'] = $user['id_utilisateur']; $_SESSION['username'] = $user['nom_utilisateur'];
        header("Location: index.php"); exit();
    } else { $error = "Identifiants invalides"; }
}
?>
<div class="container">
    <h2>Connexion</h2>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <div class="form-group"><label>Nom d'utilisateur :</label><input type="text" name="nom_utilisateur" required></div>
        <div class="form-group"><label>Mot de passe :</label><input type="password" name="mot_de_passe" required></div>
        <button type="submit">Se connecter</button>
    </form>
</div>