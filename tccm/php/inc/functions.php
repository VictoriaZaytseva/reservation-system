<?php

/**
 * Fonction viewRowFilm
 * Auteur : P21
 * Date   : 
 * But    : afficher une ligne de résultat
 * Arguments en entrée : champs d'une ligne de la requête de consultation des films 
 * Valeurs de retour   : aucune
 */
function viewRowFilm($film_titre, $film_duree, $film_annee_sortie, $realisateurs, $acteurs, $genres) {
    ?>
     <tr>
         <td><?php echo $film_titre ?></td>
         <td><?php echo $film_duree ?></td>
         <td><?php echo $film_annee_sortie ?></td>
         <td><?php echo implode("<br>", $realisateurs) ?></td>
         <td><?php echo implode("<br>", $acteurs) ?></td>
         <td><?php echo implode("<br>", $genres) ?></td>
     </tr>
    <?php
}
?>