<?php
    // Connexion, sélection de la base de données
    $dbconn = pg_connect("host=localhost dbname=electionsdb user=pi password=estilections")
        or die('Connexion impossible : ' . pg_last_error());

    $annee = ;

    $num_departement = ;

    // Exécution de la requête SQL
    $query = "SELECT code_canton, nom_canton, nb_inscrits, nb_abstentions, nb_votants, nb_blancs, nb_nuls, nuance_liste_1, sieges_liste_1, nb_voix_liste_1, voix_pourcent_ins_liste_1, nuance_liste_2, sieges_liste_2, nb_voix_liste_2, voix_pourcent_ins_liste_2, nuance_liste_3, sieges_liste_3, nb_voix_liste_3, voix_pourcent_ins_liste_3, nuance_liste_4, sieges_liste_4, nb_voix_liste_4, voix_pourcent_ins_liste_4, nuance_liste_5, sieges_liste_5, nb_voix_liste_5, voix_pourcent_ins_liste_5, nuance_liste_6, sieges_liste_6, nb_voix_liste_6, voix_pourcent_ins_liste_6, nuance_liste_7, sieges_liste_7, nb_voix_liste_7, voix_pourcent_ins_liste_7, nuance_liste_8, sieges_liste_8, nb_voix_liste_8, voix_pourcent_ins_liste_8, nuance_liste_9, sieges_liste_9, nb_voix_liste_9, voix_pourcent_ins_liste_9, nuance_liste_10, sieges_liste_10, nb_voix_liste_10, voix_pourcent_ins_liste_10, nuance_liste_11, sieges_liste_11, nb_voix_liste_11, voix_pourcent_ins_liste_11, nuance_liste_12, sieges_liste_12, nb_voix_liste_12, voix_pourcent_ins_liste_12 FROM public.t1_2015_cantons WHERE num_departement='18';";
    $result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());

    // Affichage des résultats en HTML
    echo "<table id='tour1_tab'>\n";
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "\t<tr class='tour1_ligne'>\n";
        foreach ($line as $col_value) {
            echo "\t\t<td class='tour1_colonne'>$col_value</td>\n";
        }
        echo "\t</tr>\n";
    }
    echo "</table>\n";

    // Libère le résultat
    pg_free_result($result);

    // Ferme la connexion
    pg_close($dbconn);
?>