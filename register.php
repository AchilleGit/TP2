<?php require_once 'config.db.php'; include 'header.php'; 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom']; $username = $_POST['nom_utilisateur']; $dob = $_POST['date_naissance'];
    $password_hash = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT); // Salage et hashage automatique
    $stmt = $pdo->prepare("INSERT INTO Utilisateur (nom, nom_utilisateur, mot_de_passe, date_naissance) VALUES (?, ?, ?, ?)");
    if($stmt->execute([$nom, $username, $password_hash, $dob])) echo "<div class='container'><p>Compte créé. <a href='login.php'>Connectez-vous</a></p></div>";
}
?>
<div class="container">
    <h2>Créer un nouvel utilisateur</h2>
    <form method="POST">
        <div class="form-group"><label>Nom :</label><input type="text" name="nom" required></div>
        <div class="form-group"><label>Nom d'utilisateur :</label><input type="text" name="nom_utilisateur" required></div>
        <div class="form-group"><label>Date de naissance :</label><input type="date" name="date_naissance" required></div>
        <div class="form-group"><label>Mot de passe :</label><input type="password" name="mot_de_passe" required></div>
        <button type="submit">S'inscrire</button>
    </form>
</div>