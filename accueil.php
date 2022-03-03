<?php require_once "header.inc.php" ?>
<h1>Nos annonces</h1>

<?php $affichage = execute_requete("SELECT titre,description,code_postal,ville,type,prix from advert ORDER BY id DESC"); ?>

<?php 

$content .= "<div class='container'>";
    $content .= "<h2> Nos annonces les plus récentes </h2>";
    $content.= "<table class='table table-primary table-striped'>";
        $content .= "<tr>";
            $colonne = $affichage ->columnCount();

            for($i=0; $i < $colonne; $i++){
                $titre = $affichage->getColumnMeta($i);
                $content .=mb_strtoupper("<th>$titre[name]</th>");
            }
        $content .= "</tr>";
        
        for ($i=0; $i < 15; $i++){
            $content .= "<tr>";
            $ligne = $affichage->fetch(PDO::FETCH_ASSOC);
                foreach($ligne as $key => $value){
                    if($key != 'id' && $key != 'titre' && $key != 'prix'){
                        $content .= "<td> $value</td>";
                    }
                    if($key == 'prix'){
                        $content .= "<td> $value € </td>";
                    }
                    if($key == 'titre'){
                        $content .=mb_strtoupper("<td>$value</td>", 'UTF-8');
                        
                    }
                }
            $content .= "</tr>";
        }
    $content .= "</table>";
$content .= "</div>";


echo $content;
?>