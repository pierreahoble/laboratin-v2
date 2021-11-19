<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styleResultat.css') }}">
    <title>BYLAN TYROIDIEN </title>
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
        <p>Kit: Snibe</p>
        <p>Appareil/Technique : Humclot Junior</p>
        <p>Appareil : MAGLUMI 600</p>
    </div>



    <table id="tableInfo">
        <thead>
            <th>PARAMETRES</th>
            <th>RESULTATS</th>
            <th>VALEUR DE REFERENCES</th>
        </thead>

        <tbody>
            <tr>
                <td>FT3</td>
                <td>{{ $resultats[0]->fts . ' ' }}</td>
                <td>{{ $resultats[0]->vft3 . ' ' }} pmol/l</td>
            </tr>
            <tr>
                <td>FT4</td>
                <td>{{ $resultats[0]->ftu . ' ' }}</td>
                <td>{{ $resultats[0]->vft4 . ' ' }}pmol/l</td>
            </tr>
            <tr>
                <td>TSH</td>
                <td>{{ $resultats[0]->tsh . ' ' }}</td>
                <td>{{ $resultats[0]->vtsh . ' ' }} <span>&#956;</span> UI/ml</td>
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
