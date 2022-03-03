<?php require_once 'header.inc.php'?>
<h1> Toutes nos annonces</h1>


<?php 
$all = execute_requete("SELECT * FROM advert ORDER BY id DESC");
$content .= "<p>Nombre d'annonces: " . $all->rowCount() . "</p>";

$content .= "<div class='container'><table class=table table-striped>";
    $content .= "<tr>";
        $colonne = $all->columnCount();
        for($i=0; $i<$colonne; $i++){
            $title = $all->getColumnMeta($i);
            if($title['name'] != 'id'){
                $content.= "<th>$title[name]</th>";
            }
        }
        $content .= "<th>Consulter une annonce</th>";
    $content .= "</tr>";   
    
    while($ligne = $all->fetch(PDO::FETCH_ASSOC)){
        $content .= "<tr>";
            foreach($ligne as $key=>$value){
                if(!empty($ligne['reservation_message']) && $key == 'titre'){
                    $content .= "<td>$value<span class='badge rounded-pill bg-warning text-dark'> Déjà réservé! </span></td>";
                }
                elseif($key != 'id' && $key != 'message'){
                    $content .= "<td>$value</td>";
                }
            }
            $content .= "<td><a href='annonce.php?action=reserver&id=$ligne[id]'>J'achète!</a></td>";
        $content .= "</tr>";
    }
$content .= "</div></table>";

?>



<?php echo $content; ?>
