<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styleResultat.css') }}">
    <title>Resultat - Patient </title>
    <style>
        @media print {
            #print {
                display: none;
            }
        }

    </style>
</head>

<body>






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
                    <td>{{ $patient->nom_patient . ' ' . $patient->prenom_patient }}</td>
                </tr>
                <tr>
                    <td>Age/Sexe :</td>
                    <td> {{ $patient->age_patient }} ans / Feminin</td>
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
                    <td>{{ date('d/m/y', strtotime($analyse->created_at)) }}</td>
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
                <td>{{ $resultats[0]->tca . ' ' }}sec</td>
                <td>{{ $resultats[0]->tcavpsa }} sec</td>
                <td>{{ $resultats[0]->tcavpso }} sec</td>
            </tr>
            <tr>
                <td>Temps de Prothombrine (TP)</td>
                <td>{{ $resultats[0]->tp . ' ' }}%</td>
                <td>{{ $resultats[0]->tcvpsa }}</td>
                <td>{{ $resultats[0]->tcvpso . ' ' }} %</td>
            </tr>
            <tr>
                <td>Ratio Normalisé International (INR)</td>
                <td>{{ $resultats[0]->inr }}</td>
                <td>{{ $resultats[0]->inrvpsa . ' ' }} min</td>
                <td>{{ $resultats[0]->inrvpso . ' ' }} min </td>
            </tr>
            <tr>
                <td>Temps de saignement (TS)</td>
                <td>{{ $resultats[0]->ts . ' ' }} sec</td>
                <td>{{ $resultats[0]->tsvpsa . ' ' }} min</td>
                <td>{{ $resultats[0]->tsvpso . ' ' }} min</td>
            </tr>
        </tbody>
    </table>

    <div>
        <p id="date"> </p>
        <p> <strong>Le responsable du Laboratoire</strong> </p>
    </div>

    <br>
    <br>


    <div>

        <button id="print" className="btn btn-primary" onclick=window.print()>IMPRIMER</button>

    </div>




    <script>
        $('#print').click(function() {
            $('#print').hide()
        })
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            var options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            var ladate = new Date().toLocaleDateString("fr-FR", options)
            // $('#date').innerHTML
            // var da = ladate.getDate() + "/" + (ladate.getMonth() + 1) + "/" + ladate
            //     .getFullYear()

            $('#date').html(ladate)
        })
    </script>






</body>

</html>
