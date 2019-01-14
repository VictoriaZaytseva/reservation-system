<?php
    
/**
 * Fonction errSQL
 * Auteur : P21
 * Date   : 
 * But    : afficher le message d'erreur de la dernière "query" SQL 
 * Arguments en entrée : $conn = contexte de connexion
 * Valeurs de retour   : aucune
 */
function errSQL($conn) {
    ?>
    <p>Erreur de requête : <?php echo mysqli_errno($conn)." – ".mysqli_error($conn) ?></p> 
    <?php 
}

/** 
 * Fonction sqlAjouterGenre
 * Auteur : P21
 * Date   : 
 * But    : ajouter une ligne dans la table genres  
 * Arguments en entrée : $conn = contexte de connexion
 *                       $genre_nom 
 * Valeurs de retour   : 1    si ajout effectuée
 *                       0    si aucun ajout
 */
function createEvent($conn, $room, $teacher, $class, $starttime) {
    
    $req = "INSERT INTO reservations(classroom_id, teacher_id, class_id, start_time) VALUES ('$room','$teacher','$class', '$starttime')";

    if (mysqli_query($conn, $req)) {
        return mysqli_affected_rows($conn);
    } else {
        errSQL($conn);
        exit;
    }
}

/**
 * Fonction sqlSupprimerGenre
 * Auteur : P21
 * Date   : 
 * But    : supprimer une ligne de la table genres  
 * Arguments en entrée : $conn = contexte de connexion
 *                       $id   = valeur de la clé primaire 
 * Valeurs de retour   : 1    si suppression effectuée
 *                       0    si aucune suppression
 */
function sqlSupprimerGenre($conn, $id) {
    
    $req = "DELETE FROM genres WHERE genre_id=".$id;

    if (mysqli_query($conn, $req)) {
        return mysqli_affected_rows($conn);
    } else {
        errSQL($conn);
        exit;
    }
}

function getEvents($conn, $start, $end) {

    $req = "SELECT id as title, classroom_id, teacher_id, class_id, start_time as start
            FROM reservations
            WHERE (start_time BETWEEN '$start' AND '$end')";
    
    if ($result = mysqli_query($conn, $req, MYSQLI_STORE_RESULT)) {
        $nbResult = mysqli_num_rows($result);
        $liste = array();
        if ($nbResult) {
            mysqli_data_seek($result, 0);
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $liste[] = $row;
            }
        }
        mysqli_free_result($result);
        return $liste;
    } else {
        errSQL($conn);
        exit;
    }
}

?>