<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styleRecu.css') }}">
   
    <title>Resultat - Patient </title>
</head>

<body>

    <!-- 
    <div id="tete">

        <div class="grille">
            <h3>MINISTERE DE LA SANTE ET DE L'HYGIENE PUBLIQUE</h3>
            <p>Direction Regionle de la Santé Commune</p>
            <h3>HOPITAL DE BE</h3>
            <p>Service des Laboratoires</p>
        </div>

        <div class="grille">
            RESULTATS D'ANALYSE
        </div>

        <div class="grille">
            <p>Codification : E5-16</p>
            <p>Indice de revision : 01/01/2020</p>
        </div>

    </div> -->




    <table id="tete">

        <thead>
            <th>
                <h3>MINISTERE DE LA SANTE ET DE L'HYGIENE PUBLIQUE</h3>
                <p>Direction Regionle de la Santé Commune</p>
                <h3>HOPITAL DE BE</h3>
                <p>Service des Laboratoires</p>
            </th>
            <th>
                <h5> RESULTATS D'ANALYSE</h5>
            </th>
            <th>
                <p>Codification : E5-16</p>
                <p>Indice de revision : 01/01/2020</p>
            </th>


        </thead>

    </table>
    <hr>

    <p>N 90</p>




    <div>
        <table id="tableInfo">
            <tbody>
                <tr>
                    <td>Nom et Prenoms :</td>
                    <td> GNLKVOID AKOPEM</td>
                </tr>
                <tr>
                    <td>Age/Sexe :</td>
                    <td> 28 ans / Feminin</td>
                </tr>
                <tr>
                    <td>Prescripteur /Service:</td>
                    <td> /</td>
                </tr>
                <tr>
                    <td>Diagnostic</td>
                    <td> NEANT</td>
                </tr>
                <tr>
                    <td>Date de prelevement</td>
                    <td>08/01/2021</td>
                </tr>

            </tbody>
        </table>

    </div>


    <div>
        <p>Appareil/Technique : Humclot Junior</p>
    </div>


    <div id="text">
        <h4>RESULTATS</h4>
    </div>
    <table id="tableInfo">
        <tr>
            <td>PARAMETRES</td>
            <td>RESULTATS</td>
            <td colspan="2">VALEURS DE REFERENCE</td>
        </tr>
        <tbody>
            <tr>
                <td colspan="2"></td>
                <td>Patient sans traitement anticoagulant</td>
                <td>Patient sous traitement anticoagulant</td>
            </tr>
            <tr>
                <td>Temps de Cephaline Activée (TCA)</td>
                <td>29,2 sec</td>
                <td>28-38 sec</td>
                <td>28-38 sec</td>
            </tr>
            <tr>
                <td>Temps de Prothombrine (TP)</td>
                <td>100%</td>
                <td>{`>=70%`}</td>
                <td>25 - 40 %</td>
            </tr>
            <tr>
                <td>Ratio Normalisé International (INR)</td>
                <td>0,97</td>
                <td>0,8 - 12</td>
                <td>2 - 3</td>
            </tr>
            <tr>
                <td>Temps de saignement (TS)</td>
                <td>3 min 30 s</td>
                <td>2 - 4 min</td>
                <td>2 - 4 min</td>
            </tr>
        </tbody>
    </table>









</body>

</html>
