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
                            <h4 class="card-title">Liste Des Analyses</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display min-w850">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Libelle</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nature_analyses as $key =>$nature_analyse)
                                            <tr>
                                                <td>{{ $key }}</td>
                                                <td>{{ $nature_analyse->libelle_analyse }}</td>
                                                <td> 
                                                    <button type="button" class="edit btn btn-info shadow btn-xs sharp" data-toggle="modal" data-target="#basicModal"
                                                    data-id="{{ $nature_analyse->id }}" data-libelle="{{ $nature_analyse->libelle_analyse }}" data-prix="{{ $nature_analyse->prix_unitaire }}"
                                                    > 
                                                    <i class="fa fa-edit"></i> </button></td>
                                            </tr>                                            
                                        @endforeach                                        
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Libelle</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div> 
            
            {{-- <button type="button" class="btn btn-primary mb-2" >Basic modal</button> --}}
            <!-- Modal -->
            <div class="modal fade" id="basicModal" id="modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modifier </h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form  id="myForm">
                                <div class="row">
                                    @csrf
                                    <input type="hidden" name="id" id="id">

                                    <div class="form-group row  col-md-12">
                                        <label class="col-sm-3 col-form-label col-form-label-sm">Libelle :</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"name="libelle" id="libelle" placeholder="Libelle " required  />
                                        </div>
                                    </div>    
                                    
                                    
                                    <div class="form-group row  col-md-12">
                                        <label class="col-sm-3 col-form-label col-form-label-sm">Prix Unitaire :</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control"name="Prix Unitaire" id="prix" placeholder="Prix " required  />
                                        </div>
                                    </div>                                  


                                   

                                    
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Fermer</button>
                            <button type="button" id="submit" class="btn btn-primary">Sauvegarder</button>
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



    <script>
        $(document).ready(function(){
            $('.edit').click(function(){
                $('#id').val($(this).data('id'))
                $('#libelle').val($(this).data('libelle'))
                $('#prix').val($(this).data('prix'))
            })


            $('#submit').click(function(e){
                e.preventDefault()
                var form_data = $('#myForm').serialize();


                $.ajax({
                    url : 'update_nature_analyse',
                    type: 'POST',
                    data : form_data
                }).done(function(data){
                    console.log(data)
                    $('#modal').hide()
                    // location.reload();
                })

            })
        })
    </script>

@endsection
