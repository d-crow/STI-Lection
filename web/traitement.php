<?php

    // Requête BDD tour 1 des départementales

    function affiche_tour_1_departement($annee, $num_departement) {

        $result = array();

        // Connexion, sélection de la base de données
        $dbconn = pg_connect("host=localhost dbname=electionsdb user=pi password=estilections")
        or die('Connexion impossible : ' . pg_last_error());
        switch ($annee) {

            case 2008:

                // Exécution de la requête SQL sécurisée
                $query = "SELECT code_canton, nom_canton, nuance_liste_1, voix_pourcent_exp_liste_1, nuance_liste_2, voix_pourcent_exp_liste_2, nuance_liste_3, voix_pourcent_exp_liste_3, nuance_liste_4, voix_pourcent_exp_liste_4, nuance_liste_5, voix_pourcent_exp_liste_5, nuance_liste_6, voix_pourcent_exp_liste_6, nuance_liste_7, voix_pourcent_exp_liste_7, nuance_liste_8, voix_pourcent_exp_liste_8, nuance_liste_9, voix_pourcent_exp_liste_9, nuance_liste_10, voix_pourcent_exp_liste_10, nuance_liste_11, voix_pourcent_exp_liste_11 FROM public.t1_2008_cantons WHERE num_departement=$1;";
                break;

            case 2011:

                // Exécution de la requête SQL sécurisée
                $query = "SELECT code_canton, nom_canton, nuance_liste_1, voix_pourcent_exp_liste_1, nuance_liste_2, voix_pourcent_exp_liste_2, nuance_liste_3, voix_pourcent_exp_liste_3, nuance_liste_4, voix_pourcent_exp_liste_4, nuance_liste_5, voix_pourcent_exp_liste_5, nuance_liste_6, voix_pourcent_exp_liste_6, nuance_liste_7, voix_pourcent_exp_liste_7, nuance_liste_8, voix_pourcent_exp_liste_8, nuance_liste_9, voix_pourcent_exp_liste_9, nuance_liste_10, voix_pourcent_exp_liste_10, nuance_liste_11, voix_pourcent_exp_liste_11, nuance_liste_12, voix_pourcent_exp_liste_12, nuance_liste_13, voix_pourcent_exp_liste_13 FROM public.t1_2011_cantons WHERE num_departement=$1;";
                break;

            case 2015:

                // Exécution de la requête SQL sécurisée
                $query = "SELECT code_canton, nom_canton, nuance_liste_1, voix_pourcent_exp_liste_1, nuance_liste_2, voix_pourcent_exp_liste_2, nuance_liste_3, voix_pourcent_exp_liste_3, nuance_liste_4, voix_pourcent_exp_liste_4, nuance_liste_5, voix_pourcent_exp_liste_5, nuance_liste_6, voix_pourcent_exp_liste_6, nuance_liste_7, voix_pourcent_exp_liste_7, nuance_liste_8, voix_pourcent_exp_liste_8, nuance_liste_9, voix_pourcent_exp_liste_9, nuance_liste_10, voix_pourcent_exp_liste_10, nuance_liste_11, voix_pourcent_exp_liste_11, nuance_liste_12, voix_pourcent_exp_liste_12 FROM public.t1_2015_cantons WHERE num_departement=$1;";
                break;

            case 2021:

                // Exécution de la requête SQL sécurisée
                $query = "SELECT code_canton, nom_canton, nuance_liste_1, voix_pourcent_exp_liste_1, nuance_liste_2, voix_pourcent_exp_liste_2, nuance_liste_3, voix_pourcent_exp_liste_3, nuance_liste_4, voix_pourcent_exp_liste_4, nuance_liste_5, voix_pourcent_exp_liste_5, nuance_liste_6, voix_pourcent_exp_liste_6, nuance_liste_7, voix_pourcent_exp_liste_7, nuance_liste_8, voix_pourcent_exp_liste_8, nuance_liste_9, voix_pourcent_exp_liste_9, nuance_liste_10, voix_pourcent_exp_liste_10, nuance_liste_11, voix_pourcent_exp_liste_11, nuance_liste_12, voix_pourcent_exp_liste_12, nuance_liste_13, voix_pourcent_exp_liste_13, nuance_liste_14, voix_pourcent_exp_liste_14 FROM public.t1_2021_cantons WHERE num_departement=$1;";
                break;

            default:
                
                //Si l'année n'est pas valide
                $result['error'] = "Pas d'information pour l'année ".$annee;
                return $result;
            
        }
        $res = pg_query_params($dbconn, $query, array($num_departement)) or die('Échec de la requête : ' . pg_last_error());

        // Ferme la connexion
        pg_close($dbconn);

        while ($row = pg_fetch_row($res)) {
            $result[] = $row;
        }

        //On retourne la requête
        return $result;
    }


    // Requête bdd pour le 2ème tour des départementales
    function affiche_tour_2_departement($annee, $num_departement) {

        $result = array();

        // Connexion, sélection de la base de données
        $dbconn = pg_connect("host=localhost dbname=electionsdb user=pi password=estilections")
        or die('Connexion impossible : ' . pg_last_error());
        switch ($annee) {

            case 2008:

                // Exécution de la requête SQL sécurisée
                $query = "SELECT code_canton, nom_canton, nuance_liste_1, voix_pourcent_exp_liste_1, nuance_liste_2, voix_pourcent_exp_liste_2, nuance_liste_3, voix_pourcent_exp_liste_3, nuance_liste_4, voix_pourcent_exp_liste_4 FROM public.t2_2008_cantons WHERE num_departement=$1;";
                break;

            case 2011:

                // Exécution de la requête SQL sécurisée
                $query = "SELECT code_canton, nom_canton, nuance_liste_1, voix_pourcent_exp_liste_1, nuance_liste_2, voix_pourcent_exp_liste_2, nuance_liste_3, voix_pourcent_exp_liste_3 FROM public.t2_2011_cantons WHERE num_departement=$1;";
                break;

            case 2015:

                // Exécution de la requête SQL sécurisée
                $query = "SELECT code_canton, nom_canton, nuance_liste_1, voix_pourcent_exp_liste_1, nuance_liste_2, voix_pourcent_exp_liste_2, nuance_liste_3, voix_pourcent_exp_liste_3 FROM public.t2_2015_cantons WHERE num_departement=$1;";
                break;

            //case 2021:

                // Exécution de la requête SQL sécurisée
                //$query = "SELECT code_canton, nom_canton, nuance_liste_1, voix_pourcent_exp_liste_1, nuance_liste_2, voix_pourcent_exp_liste_2, nuance_liste_3, voix_pourcent_exp_liste_3 FROM public.t2_2021_cantons WHERE num_departement=$1;";
                //break;

            default:
                
                //Si l'année n'est pas valide
                $result['error'] = "Pas d'information pour l'année ".$annee;
                return $result;
            
        }
        $res = pg_query_params($dbconn, $query, array($num_departement)) or die('Échec de la requête : ' . pg_last_error());

        // Ferme la connexion
        pg_close($dbconn);

        while ($row = pg_fetch_row($res)) {
            $result[] = $row;
        }

        //On retourne la requête
        return $result;
    }

    function donnees_ia_tour_1_departement($annee, $departement) {

        $result = array();

        // Connexion, sélection de la base de données
        $dbconn = pg_connect("host=localhost dbname=electionsdb user=pi password=estilections")
        or die('Connexion impossible : ' . pg_last_error());
        switch ($annee) {

            case 2008:

                // Exécution de la requête SQL sécurisée
                $query = "SELECT code_canton, nom_canton, nuance_liste_1, voix_pourcent_ins_liste_1, voix_pourcent_exp_liste_1, nuance_liste_2, voix_pourcent_ins_liste_2, voix_pourcent_exp_liste_2, nuance_liste_3, voix_pourcent_ins_liste_3, voix_pourcent_exp_liste_3, nuance_liste_4, voix_pourcent_ins_liste_4, voix_pourcent_exp_liste_4, nuance_liste_5, voix_pourcent_ins_liste_5, voix_pourcent_exp_liste_5, nuance_liste_6, voix_pourcent_ins_liste_6, voix_pourcent_exp_liste_6, nuance_liste_7, voix_pourcent_ins_liste_7, voix_pourcent_exp_liste_7, nuance_liste_8, voix_pourcent_ins_liste_8, voix_pourcent_exp_liste_8, nuance_liste_9, voix_pourcent_ins_liste_9, voix_pourcent_exp_liste_9, nuance_liste_10, voix_pourcent_ins_liste_10, voix_pourcent_exp_liste_10, nuance_liste_11, voix_pourcent_ins_liste_11, voix_pourcent_exp_liste_11 FROM public.t1_2008_cantons WHERE num_departement=$1;";
                break;

            case 2011:

                // Exécution de la requête SQL sécurisée
                $query = "SELECT code_canton, nom_canton, nuance_liste_1, voix_pourcent_ins_liste_1, voix_pourcent_exp_liste_1, nuance_liste_2, voix_pourcent_ins_liste_2, voix_pourcent_exp_liste_2, nuance_liste_3, voix_pourcent_ins_liste_3, voix_pourcent_exp_liste_3, nuance_liste_4, voix_pourcent_ins_liste_4, voix_pourcent_exp_liste_4, nuance_liste_5, voix_pourcent_ins_liste_5, voix_pourcent_exp_liste_5, nuance_liste_6, voix_pourcent_ins_liste_6, voix_pourcent_exp_liste_6, nuance_liste_7, voix_pourcent_ins_liste_7, voix_pourcent_exp_liste_7, nuance_liste_8, voix_pourcent_ins_liste_8, voix_pourcent_exp_liste_8, nuance_liste_9, voix_pourcent_ins_liste_9, voix_pourcent_exp_liste_9, nuance_liste_10, voix_pourcent_ins_liste_10, voix_pourcent_exp_liste_10, nuance_liste_11, voix_pourcent_ins_liste_11, voix_pourcent_exp_liste_11, nuance_liste_12, voix_pourcent_ins_liste_12, voix_pourcent_exp_liste_12, nuance_liste_13, voix_pourcent_ins_liste_13, voix_pourcent_exp_liste_13 FROM public.t1_2011_cantons WHERE num_departement=$1;";
                break;

            case 2015:

                // Exécution de la requête SQL sécurisée
                $query = "SELECT code_canton, nom_canton, nuance_liste_1, voix_pourcent_ins_liste_1, voix_pourcent_exp_liste_1, nuance_liste_2, voix_pourcent_ins_liste_2, voix_pourcent_exp_liste_2, nuance_liste_3, voix_pourcent_ins_liste_3, voix_pourcent_exp_liste_3, nuance_liste_4, voix_pourcent_ins_liste_4, voix_pourcent_exp_liste_4, nuance_liste_5, voix_pourcent_ins_liste_5, voix_pourcent_exp_liste_5, nuance_liste_6, voix_pourcent_ins_liste_6, voix_pourcent_exp_liste_6, nuance_liste_7, voix_pourcent_ins_liste_7, voix_pourcent_exp_liste_7, nuance_liste_8, voix_pourcent_ins_liste_8, voix_pourcent_exp_liste_8, nuance_liste_9, voix_pourcent_ins_liste_9, voix_pourcent_exp_liste_9, nuance_liste_10, voix_pourcent_ins_liste_10, voix_pourcent_exp_liste_10, nuance_liste_11, voix_pourcent_ins_liste_11, voix_pourcent_exp_liste_11, nuance_liste_12, voix_pourcent_ins_liste_12, voix_pourcent_exp_liste_12 FROM public.t1_2015_cantons WHERE num_departement=$1;";
                break;

            case 2021:

                // Exécution de la requête SQL sécurisée
                $query = "SELECT code_canton, nom_canton, nuance_liste_1, voix_pourcent_ins_liste_1, voix_pourcent_exp_liste_1, nuance_liste_2, voix_pourcent_ins_liste_2, voix_pourcent_exp_liste_2, nuance_liste_3, voix_pourcent_ins_liste_3, voix_pourcent_exp_liste_3, nuance_liste_4, voix_pourcent_ins_liste_4, voix_pourcent_exp_liste_4, nuance_liste_5, voix_pourcent_ins_liste_5, voix_pourcent_exp_liste_5, nuance_liste_6, voix_pourcent_ins_liste_6, voix_pourcent_exp_liste_6, nuance_liste_7, voix_pourcent_ins_liste_7, voix_pourcent_exp_liste_7, nuance_liste_8, voix_pourcent_ins_liste_8, voix_pourcent_exp_liste_8, nuance_liste_9, voix_pourcent_ins_liste_9, voix_pourcent_exp_liste_9, nuance_liste_10, voix_pourcent_ins_liste_10, voix_pourcent_exp_liste_10, nuance_liste_11, voix_pourcent_ins_liste_11, voix_pourcent_exp_liste_11, nuance_liste_12, voix_pourcent_ins_liste_12, voix_pourcent_exp_liste_12, nuance_liste_13, voix_pourcent_ins_liste_13, voix_pourcent_exp_liste_13 FROM public.t1_2021_cantons WHERE num_departement=$1;";
                break;

            default:
                
                //Si l'année n'est pas valide
                $result['error'] = "Pas d'information pour l'année ".$annee;
                return $result;
            
        }
        $res = pg_query_params($dbconn, $query, array($departement)) or die('Échec de la requête : ' . pg_last_error());

        // Ferme la connexion
        pg_close($dbconn);

        while ($row = pg_fetch_row($res)) {
            $result[] = $row;
        }

        //On retourne la requête
        return $result;

    }

    function donnees_ia_tour_1_input($annee, $departement, $canton) {

        $result = array();

        // Connexion, sélection de la base de données
        $dbconn = pg_connect("host=localhost dbname=electionsdb user=pi password=estilections")
        or die('Connexion impossible : ' . pg_last_error());
        switch ($annee) {

            // case 2008:

            //     // Exécution de la requête SQL sécurisée
            //     $query = "SELECT nb_inscrits, nb_exprimés, abs_pourcent_ins, blancs_nuls_pourcent_vot, exp_pourcent_vot, bc_com, bc_div, bc_dlf, bc_dvd, bc_dvg, bc_exd, bc_exg, bc_fg, bc_fn, bc_mdm, bc_pg, bc_rdg, bc_soc, bc_uc, bc_ud, bc_udi, bc_ug, bc_ump, bc_vec FROM public.t1_2008_cantons WHERE num_departement=$1;";
            //     break;

            // case 2011:

            //     // Exécution de la requête SQL sécurisée
            //     $query = "SELECT nb_inscrits, nb_exprimés, abs_pourcent_ins, blancs_nuls_pourcent_vot, exp_pourcent_vot, bc_com, bc_div, bc_dlf, bc_dvd, bc_dvg, bc_exd, bc_exg, bc_fg, bc_fn, bc_mdm, bc_pg, bc_rdg, bc_soc, bc_uc, bc_ud, bc_udi, bc_ug, bc_ump, bc_vec, nuance_liste_12, voix_pourcent_ins_liste_12, voix_pourcent_exp_liste_12, nuance_liste_13, voix_pourcent_ins_liste_13, voix_pourcent_exp_liste_13 FROM public.t1_2011_cantons WHERE num_departement=$1;";
            //     break;

            case 2015:

                // Exécution de la requête SQL sécurisée
                $query = "SELECT nb_inscrits, nb_exprimés, abs_pourcent_ins, blancs_nuls_pourcent_vot, exp_pourcent_vot, bc_com, bc_div, bc_dlf, bc_dvd, bc_dvg, bc_exd, bc_exg, bc_fg, bc_fn, bc_mdm, bc_pg, bc_rdg, bc_soc, bc_uc, bc_ud, bc_udi, bc_ug, bc_ump, bc_vec FROM public.input_data_2015 WHERE code_departement=$1 and code_canton=$2;";
                break;

            // case 2021:

            //     // Exécution de la requête SQL sécurisée
            //     $query = "SELECT nb_inscrits, nb_exprimés, abs_pourcent_ins, blancs_nuls_pourcent_vot, exp_pourcent_vot, bc_com, bc_div, bc_dlf, bc_dvd, bc_dvg, bc_exd, bc_exg, bc_fg, bc_fn, bc_mdm, bc_pg, bc_rdg, bc_soc, bc_uc, bc_ud, bc_udi, bc_ug, bc_ump, bc_vec, nuance_liste_12, voix_pourcent_ins_liste_12, voix_pourcent_exp_liste_12, nuance_liste_13, voix_pourcent_ins_liste_13, voix_pourcent_exp_liste_13 FROM public.t1_2021_cantons WHERE num_departement=$1;";
            //     break;

            default:
                
                //Si l'année n'est pas valide
                $result['error'] = "Pas d'information pour l'année ".$annee;
                return $result;
            
        }
        $res = pg_query_params($dbconn, $query, array($departement, $canton)) or die('Échec de la requête : ' . pg_last_error());

        // Ferme la connexion
        pg_close($dbconn);

        while ($row = pg_fetch_row($res)) {
            $result[] = $row;
        }

        //On retourne la requête
        return $result;

    }
    

    function get_all_years() {
        $result = array();

        // Connexion, sélection de la base de données
        $dbconn = pg_connect("host=localhost dbname=electionsdb user=pi password=estilections")
        or die('Connexion impossible : ' . pg_last_error());

        $query = "SELECT tablename FROM pg_catalog.pg_tables WHERE schemaname != 'pg_catalog' AND schemaname != 'information_schema';";
        $res = pg_query($dbconn, $query) or die('Échec de la requête : ' . pg_last_error());

        // Ferme la connexion
        pg_close($dbconn);

        while ($row = pg_fetch_row($res)) {
            $result[] = $row;
        }

        //On retourne la requête
        return $result;

    }

    function get_available_models() {
        $result = array();

        foreach (scandir('models') as $year) {
            if ($year[0]!='.') {
                $result[$year] = array();
                foreach (scandir('models/'.$year) as $model) {
                    if ($model[0]!='.') {
                        array_push($result[$year], $model);
                    }
                }
            }
        }
        return $result;
    }


    header('Content-Type: application/json');

    $resultat_requete = array();
 
    if ( !isset($_POST['functionname']) ) {
        $resultat_requete['error'] = "Pas de nom de fonction !";
    }
    if ( !isset($_POST['arguments']) ) {
        $resultat_requete['error'] = "Pas d'aguments de fonction !"; 
    }
    if ( !isset($resultat_requete['error']) ) {
        switch ( $_POST['functionname'] ) {
            case 'affiche_tour_1_departement':
                if ( !is_array($_POST['arguments']) || (count($_POST['arguments']) != 2) ) {
                    $resultat_requete['error'] = "Erreur d'argument !";
                }
                else {
                    $resultat_requete['result'] = affiche_tour_1_departement( intval($_POST['arguments'][0]), strval($_POST['arguments'][1]) );
                }
                break;
            
            case 'affiche_tour_2_departement':
                if ( !is_array($_POST['arguments']) || (count($_POST['arguments']) != 2 ) ) {
                    $resultat_requete['error'] = "Erreur d'arguments !";
                }
                else {
                    $resultat_requete['result'] = affiche_tour_2_departement( intval($_POST['arguments'][0]), strval($_POST['arguments'][1]) );
                }
                break;

            case 'affiche_tour_1_region':
                if ( !is_array($_POST['arguments']) || (count($_POST['arguments']) != 2) ) {
                    $resultat_requete['error'] = "Erreur d'argument !";
                }
                else {
                    $resultat_requete['result'] = affiche_tour_1_region( intval($_POST['arguments'][0]), strval($_POST['arguments'][1]) );
                }
                break;
            
            case 'affiche_tour_2_region':
                if ( !is_array($_POST['arguments']) || (count($_POST['arguments']) != 2 ) ) {
                    $resultat_requete['error'] = "Erreur d'arguments !";
                }
                else {
                    $resultat_requete['result'] = affiche_tour_2_region( intval($_POST['arguments'][0]), strval($_POST['arguments'][1]) );
                }
                break;

            case 'donnees_ia_tour_1_departement':
                if ( !is_array($_POST['arguments']) || (count($_POST['arguments']) != 2 ) ) {
                    $resultat_requete['error'] = "Erreur d'arguments !";
                }
                else {
                    $resultat_requete['result'] = donnees_ia_tour_1_departement( intval($_POST['arguments'][0]), strval($_POST['arguments'][1]) );
                }
                break;

            case 'donnees_ia_tour_1_input':
                if ( !is_array($_POST['arguments']) || (count($_POST['arguments']) != 3 ) ) {
                    $resultat_requete['error'] = "Erreur d'arguments !";
                }
                else {
                    $resultat_requete['result'] = donnees_ia_tour_1_input( intval($_POST['arguments'][0]), strval($_POST['arguments'][1]), strval($_POST['arguments'][2]));
                }
                break;


            case 'estimation_tour_2_region':
                if ( !is_array($_POST['arguments']) || (count($_POST['arguments']) != 2 ) ) {
                    $resultat_requete['error'] = "Erreur d'arguments !";
                }
                else {
                    $resultat_requete['result'] = estimation_tour_2_region( intval($_POST['arguments'][0]), strval($_POST['arguments'][1]) );
                }
                break;

            case 'get_all_years':
                $resultat_requete['result'] = get_all_years();
                break;

            case 'get_available_models':
                $resultat_requete['result'] = get_available_models();
                break;

            default:
                $resultat_requete['error'] = "La fonction ".$_POST['functionname']." n'a pas été trouvée";
                break;
        }
    }

    echo json_encode($resultat_requete);

?>