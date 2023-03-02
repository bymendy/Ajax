<?php
$host = 'mysql:host=localhost;dbname=entreprise';
$login = 'root';
$password = '';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
);
$pdo = new PDO($host, $login, $password, $options);
// echo '<pre>'; print_r($_POST); echo '</pre>';

// json_decode(json, true) // pour obtenir un format json en tableau array
// json_encode(array) // pour transformer le tableau array en format json

// on prépare le tableau qui contiendra la réponse à envoyer côté js
$reponse = array();
$reponse['contenu'] = '';

if (isset($_POST['id_employes'])) {

    $recup = $pdo->prepare("SELECT * FROM employes WHERE id_employes = :id_employes");
    $recup->bindParam(':id_employes', $_POST['id_employes'], PDO::PARAM_STR);
    $recup->execute();

    if ($recup->rowCount() > 0) {
        // on a récupéré une ligne, on traite avec le ftech()
        $infos = $recup->fetch(PDO::FETCH_ASSOC);
        // echo '<pre>'; print_r($infos); echo '</pre>';

        $reponse['contenu'] .= '<table class="table table-bordered">';
        $reponse['contenu'] .= '<tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Service</th>
                                    <th>Salaire</th>
                                    <th>Sexe</th>
                                    <th>Date embauche</th>
                                </tr>';
        $reponse['contenu'] .= '<tr>
                                <td>' . $infos['id_employes'] . '</td>
                                <td>' . $infos['nom'] . '</td>
                                <td>' . $infos['prenom'] . '</td>
                                <td>' . $infos['service'] . '</td>
                                <td>' . $infos['salaire'] . '</td>
                                <td>' . $infos['sexe'] . '</td>
                                <td>' . $infos['date_embauche'] . '</td>
                            </tr>';
        $reponse['contenu'] .= '</table>';
        
    } else {
        $reponse['contenu'] = '<p>Aucun résultat pour votre recherche</p>';
    }
}


// on affiche la réponse dans la page sous format json
echo json_encode($reponse);
