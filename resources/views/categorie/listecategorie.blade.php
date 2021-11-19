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
                            <h4 class="card-title">Basic Datatable</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display min-w850">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Libelle Catégorie</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $key => $categorie)
                                            <tr>
                                                <td>{{ $key }}</td>
                                                <td>{{ $categorie->libelle_categorie }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-info shadow btn-xs sharp"> <i class="fa fa-edit"></i> </a>
                                                </td>
                                            </tr>
                                            
                                        @endforeach
                                             
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Libelle Catégorie</th>
                                            <th>Actions</th>                                            
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
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

@section('scriptSecondaire')
    <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
@endsection

