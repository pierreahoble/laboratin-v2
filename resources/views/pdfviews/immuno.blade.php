<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styleResultat.css') }}">
    <title> IMMUNO-SEROLOGIE </title>
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

    <br>
    <br>



    <table id="tableInfo">
        <thead>
            <th>PARAMETRES</th>
            <th>RESULTATS</th>
            <th>KIT</th>
            <th>TECHNIQUE</th>
        </thead>

        <tbody>
            <tr>
                <td>AgHBs</td>
                <td>{{ $resultats[0]->aghbs  }}</td>
                <td> {{ $resultats[0]->aghbsKit  }} </td>
                <td> {{ $resultats[0]->aghbsTech  }} </td>
            </tr>

            <tr>
                <td>TPHA</td>
                <td>{{ $resultats[0]->tpha  }}</td>
                <td>{{ $resultats[0]->tphaKit  }}</td>
                <td>{{ $resultats[0]->tphaTech  }}</td>
                
            </tr>

            <tr>
                <td>VDRL</td>
                <td>{{ $resultats[0]->vdrl  }}</td>
                <td>{{ $resultats[0]->vdrlKit  }}</td>
                <td>{{ $resultats[0]->vdrlTech  }}</td>
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





    <script>
        $('#print').click(function() {
            $('#print').hide()
        })
    </script>








</body>

</html>
