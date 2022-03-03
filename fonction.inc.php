<?php
//Fonction de debugage :
function debug( $arg ){

    echo "<div style='background:#fda500; z-index:1000'>";

        $trace = debug_backtrace();
        

        echo "<p>Debug demandé dans le fichier : ". $trace[0]['file'] ." à la ligne : " . $trace[0]['line'] . "</p>";


        print "<pre>";
            print_r( $arg );
        print "</pre>";

    echo "</div>";
}

//fonction pour exécuter la requête :
function execute_requete( $req ){

    global $pdo; 

    $pdostatement = $pdo->query( $req );

    return $pdostatement;
}
?>