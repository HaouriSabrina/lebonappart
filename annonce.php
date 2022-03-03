<?php require_once "header.inc.php";

if (!empty ($_POST)){
    if(isset($_GET['action']) && $_GET['action'] == "reserver"){
        execute_requete("UPDATE advert SET reservation_message ='$_POST[reservation_message]' WHERE id = $_GET[id]");
        $content .= "<div class='alert alert-success'>Votre message a bien été envoyé.</div>";
    }
}

$content .= "<div class='container'><h1>Annonce</h1>";
    if(isset($_GET['id'])){
        $annonce = execute_requete("SELECT * FROM advert WHERE id ='$_GET[id]'");
    }else{
        header('location:accueil.php');
        exit;
    }

    $detail = $annonce->fetch(PDO::FETCH_ASSOC);

    foreach($detail as $key=> $value){
        if($key != 'id'){
            $content .= "<p><strong> $key </strong> : $value </p>";
        }
    }
$content .= "</div>";

if(!empty($detail['reservation_message'])){
    $content .= "<span class='badge rounded-pill bg-danger'> Déjà réservé </span>";
}else {
    $content .= 
    "<div class='container'>
        <form method='post'>
    
            <label for='reservation_message'><u>Saisir ici votre message :</u></label><br><br>
            <textarea name='reservation_message' id='reservation_message' cols='60' rows='10'></textarea><br>
            <input type='submit' value='reserver' class='btn btn-secondary'><br>
        </form>
    </div>";
}


echo $content;?>

