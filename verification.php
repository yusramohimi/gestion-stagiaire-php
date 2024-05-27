<?php
session_start();
require('database.php');

if (empty($_POST['loginAdmin']) || empty($_POST['motPasse'])) {
    
    $_SESSION['loginError'] = "Les données d'authentification sont obligatoires";
    header("Location: authentifier.php");
    exit;
}


$statement = $pdo->prepare("SELECT * FROM compteadministrateur WHERE loginAdmin = :loginAdmin AND motPasse = :motPasse");
$statement->execute([
    ':loginAdmin' => $_POST['loginAdmin'],
    ':motPasse' => $_POST['motPasse']
]);
$admin = $statement -> fetch(PDO::FETCH_ASSOC);
if ($admin) {
    $_SESSION['loginAdmin'] = $admin['loginAdmin']; 
    unset($_SESSION["loginError"]);
    header("Location: espaceprivee.php");
    exit;
} else{
    $_SESSION['loginError'] = "Les données d'authentification sont incorrects ";
    
    header('Location: authentifier.php');
    exit;
}

?>
