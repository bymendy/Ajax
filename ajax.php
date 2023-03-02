<?php
// json_decode(json, true) // pour obtenir un format json en tableau array
// json_encode(array) // pour transformer le tableau array en format json

// on prépare le tableau qui contiendra la réponse à envoyer côté js
$reponse = array();
$reponse['contenu'] = '';

if (isset($_POST['id_employes'])) {

    // récupération du fichier contenant lesinformations au format json
    if (file_exists('employes.json')) {
        $fichier = file_get_contents('employes.json');

        $fichier = json_decode($fichier, true);

        // echo '<pre>'; print_r($fichier); echo '</pre>';

        foreach($fichier AS $sous_tableau) {
            if($_POST['id_employes'] == $sous_tableau['id_employes']) {
                $reponse['contenu'] .= '<table class="table table-bordered">';
                $reponse['contenu'] .= '<tr class="bg-primary text-white">
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Service</th>
                                            <th>Salaire</th>
                                            <th>Sexe</th>
                                            <th>Date embauche</th>
                                        </tr>';
                $reponse['contenu'] .= '<tr>
                                        <td>' . $sous_tableau['id_employes'] . '</td>
                                        <td>' . $sous_tableau['nom'] . '</td>
                                        <td>' . $sous_tableau['prenom'] . '</td>
                                        <td>' . $sous_tableau['service'] . '</td>
                                        <td>' . $sous_tableau['salaire'] . '</td>
                                        <td>' . $sous_tableau['sexe'] . '</td>
                                        <td>' . $sous_tableau['date_embauche'] . '</td>
                                    </tr>';
                $reponse['contenu'] .= '</table>';
            }
        }

    }

    
}


// on affiche la réponse dans la page sous format json
echo json_encode($reponse);


