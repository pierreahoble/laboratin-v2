@extends('base')

@section('style')
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!-- Custom Stylesheet -->
@endsection

@section('contenu')

    <div class="content-body">
        <div class="container-fluid">
          
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Liste Des Resultas Analyses</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display min-w850">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>CODE ANALYSE</th>
                                            <th>ANALYSES</th>
                                            <th>PATIENTS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        @foreach ($resultats as $key => $resultat)                                            
                                            @php 
                                            //Supprimer les doublons d'objets  dans tableau d'objets
                                            $categories = $resultat['categorie'];
                                                $new = array();
                                                foreach($categories as $value) {
                                                    $new[serialize($value)] = $value;
                                                }
                                                 $categories = array_values($new);                                                                     
                                            @endphp
                                            <tr>
                                                <td>{{ $key }}</td>
                                                <td>{{ $resultat->code }}</td>
                                                <td>
                                                    <table>
                                                        @foreach ($categories as $categorie)
                                                            <tr>
                                                                {{ $categorie->libelle_categorie }} <a href="{{ url("/recu_resultat",["id"=>$resultat->id,"code"=>$resultat->code,"categorie"=>$categorie->id]) }}" target="_blanc" class="btn btn-info shadow btn-xs sharp mr-1 mt-1"> <i class="fa fa-print"></i> </a> <br>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </td>
                                                <td>{{ $resultat['patient']->nom_patient.' '.$resultat['patient']->prenom_patient }}</td>
                                            </tr>
                                        @endforeach
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>CODE ANALYSE</th>
                                            <th>ANALYSES</th>
                                            <th>PATIENTS</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>             
            </div>


        </div>



    </div>


@endsection

@section('script')
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
@endsection

@section('scriptSecondaire')

    <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>


@endsection