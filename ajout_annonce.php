<?php require_once "header.inc.php"?>


<?php

foreach($_POST as $key => $value){
    $_POST[$key] = htmlentities(addslashes($value));
}

if ($_POST){
    if(empty($_POST['titre']) || empty($_POST['description']) || empty($_POST['code_postal'])){
        $error .= "<div class='alert alert-danger'>Tous les champs sont obligatoires </div>";
    } 
    if(!is_numeric($_POST['code_postal']) && !is_numeric($_POST['prix'])){
            $error .= "<div class='alert alert-danger'>Vous devez saisir des chiffres! </div>";
    } 
        
        elseif(empty($error) && isset($_GET['action']) == 'ajouter'){
            execute_requete("
                INSERT INTO advert (titre,description,code_postal,ville,type,prix)
                    VALUES(
                        '$_POST[titre]',
                        '$_POST[description]',
                        '$_POST[code_postal]',
                        '$_POST[ville]',
                        '$_POST[type]',
                        '$_POST[prix]'
                    )
                
                ");
                
            $content .= "<div class='alert alert-warning'> Votre annonce a bien été ajoutée! </div>";
}
}

$titre ='';
$description ='';
$code_postal ='';
$ville ='';
$location ='location';
$vente ='vente';
$prix ='';


?>

<?php echo $error; ?>

<?= $content; ?>
<h1>Ajouter votre annonce ici!</h1>

<div class="container">
    <form method="post">
        <label for="titre">Titre de l'annonce</label><br>
        <input type="text" name="titre" value="<?= $titre ?>"><br>

        <label for="description"> Description de votre annonce</label><br>
        <textarea name="description" value="<?= $description ?>" ></textarea></textarea><br>

        <label for="code_postal">Code postal</label><br>
        <input type="text" name="code_postal" value="<?= $code_postal ?>"><br>

        <label for="ville">Ville</label><br>
        <input type="text" name="ville" value="<?= $ville ?>"><br>
        
        <label for="type">Votre type d'annonce</label><br>
        <select name="type" id="type">
            <option value="<?= $location ?>">Location</option>
            <option value="<?= $vente ?>">Vente</option>
        </select><br>

        <label for="prix">Prix</label><br>
        <input type="text" name="prix" value="<?= $prix ?>"><br><br>

        <input type="submit" value="<?= ucfirst($_GET['action']); ?>" class="btn btn-outline-warning">

    </form>
</div>