<?php
// 01 - créer une connexion bdd sur la bdd entreprise
// 02 - récupérer la liste des employés pour générer les options du select
// 03 - les options devront contenir les noms et prénoms affichés et l'id_employes dans la value
// exemple : <option value="350">Jean-pierre Laborde</option>

$host = 'mysql:host=localhost;dbname=entreprise';
$login = 'root';
$password = '';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
);

$pdo = new PDO($host, $login, $password, $options);

$liste_employes = $pdo->query("SELECT * FROM employes ORDER BY prenom, nom");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AJAX - GET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
</head>

<body>
    <header class="bg-primary p-5 text-center text-white">
        <h1 class="p-3">Employés</h1>
    </header>

    <div class="container border mt-5">
        <div class="row">
            <div class="col-sm-12 p-3">
                <select id="choix" class="form-select">
                    <option disabled selected>Choisir un employé</option>
                    <?php while ($ligne = $liste_employes->fetch(PDO::FETCH_ASSOC)) { ?>

                        <option value="<?php echo $ligne['id_employes']; ?>"><?php echo $ligne['prenom'] . ' ' . $ligne['nom']; ?></option>

                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-12 p-3 mt-3" id="affichage">

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        /*
        document.getElementById('choix').addEventListener('change', function () {
            console.log(this.value); // on récupère la value du choix utilisateur

            let url = 'ajax.php'; // l'url cible pour l'appel ajax

            let xhttp;

            // Instanciation de l'objet ajax
            if(window.XMLHttpRequest) {
                xhttp = new XMLHttpRequest() // pour tous les navigateurs récents
            } else {
                xhttp = new ActiveXObject("Microsoft.XMLHTTP"); // pour internet explorer < version 9
            }

            // Récupération de la valeur
            let id = this.value;
            // préparation des informations POST 
            let param = 'id_employes=' + id;
            // let param = 'id_employes=' + id + '&indice2=valeur2&indice3=valeur3';

            xhttp.open('POST', url, true);

            // Lors d'une communication POST, la ligne suivante est obligatoire et doit se trouver juste après la methode open()
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.onreadystatechange = function () {

                if(xhttp.status == 200 && xhttp.readyState == 4) {
                    console.log(xhttp.responseText);
                    // la réponse est du texte brut (qui respecte le format json)
                    // on transforme la réponse en véritable objet JSON
                    let reponse = JSON.parse(xhttp.responseText);
                    console.log(reponse);

                    // on envoi
                    document.getElementById('affichage').innerHTML = reponse.contenu;
                    
                }
            }
            // on donne les paramètres que l'on retrouvera dans post
            xhttp.send(param);

        });
        */
    </script>

    <script
    src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script>
        // https://api.jquery.com/jQuery.post/
        // $.post(url, param, function, format)

        // this.value; // en natif
        // $(this).val(); // avec jQuery

        $('#choix').on('change', function() {
            $.post('ajax.php', { id_employes : $(this).val() }, function (data) {
                $('#affichage').html(data.contenu);
            }, 'json' );
        });

    </script>
</body>

</html>