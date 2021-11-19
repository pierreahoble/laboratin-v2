@extends('base')
@section('style')
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Custom Stylesheet -->

@endsection

@section('contenu')

    <div class="content-body">
        <div class="container-fluid">

            <div class="alert alert-success alert-dismissible fade show" id="showMessage">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
                <strong>Success!</strong> Patient Modifié avec success.
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Liste Des Patients</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display min-w850">
                                    <thead>
                                        <tr>
                                            <th>Nom & Prenoms</th>
                                            <th>Numero de Tel</th>
                                            <th>Age</th>
                                            <th>Accompagnant</th>
                                            <th>Numero Accompagnant</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($patients as $patient)
                                        @php
                                            $nomA = $patient->nom_accompagnant_patient
                                        @endphp
                                            <tr>
                                                <td>{{ $patient->nom_patient.' '.$patient->prenom_patient }}</td>
                                                <td>{{ $patient->telephone_patient }}</td>
                                                <td>{{ $patient->age_patient }}</td>
                                                <td>{{ $patient->nom_accompagnant_patient }}</td>
                                                <td>{{ $patient->telephone_accompagnant_patient }}</td>
                                                <td>
                                                    <button data-toggle="modal" data-target=".bd-example-modal-lg" class="edit btn btn-info shadow btn-xs sharp mr-1"
                                                    data-id="{{ $patient->id }}" data-nom="{{ $patient->nom_patient }}" data-tel="{{ $patient->telephone_patient }}" 
                                                    data-age="{{ $patient->age_patient }}"  data-noma="{{ $nomA }}" data-tela="{{ $patient->telephone_accompagnant_patient }}" 
                                                    data-adresse="{{ $patient->adresse }}" data-observation="{{ $patient->observation }}" data-prenom="{{ $patient->prenom_patient }}"
                                                    ><i class="fa fa-edit"></i> </button>
                                                </td>
                                            </tr>                                            
                                        @endforeach
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Nom & Prenoms</th>
                                            <th>Numero de Tel</th>
                                            <th>Age</th>
                                            <th>Accompagnant</th>
                                            <th>Numero Accompagnant</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            {{-- <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> --}}

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modifier un Patient</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="myForm" >
                                <div class="row">
                                    @csrf
                                    <input type="hidden" name="id" id="id">

                                    <div class="form-group row  col-md-6">
                                        <label class="col-sm-3 col-form-label col-form-label-sm">Nom :</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"name="nom" id="nom" placeholder="Nom Du Patient" required  />
                                        </div>
                                    </div>



                                    <div class="form-group row col-md-6">
                                        <label class="col-sm-3 col-form-label">Prénom :</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom Du Patient" required  />
                                        </div>
                                    </div>


                                    <div class="form-group row col-md-6">
                                        <label class="col-sm-3 col-form-label">Adresse :</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse Du Patient" required  />
                                        </div>
                                    </div>


                                    <div class="form-group row col-md-6">
                                        <label class="col-sm-3 col-form-label">Tél. Patient :</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Numéro Du Patient" required  />
                                        </div>
                                    </div>

                                    <div class="form-group row col-md-6">
                                        <label class="col-sm-3 col-form-label">Age Patient :</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="age" name="age" placeholder="Numéro Du Patient" required  />
                                        </div>
                                    </div>

                                    <div class="form-group row col-md-6">
                                        <label class="col-sm-3 col-form-label">Accompagnant :</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nomAccompagnant" name="nomAccompagnant" placeholder="Nom Du Patient" required  />
                                        </div>
                                    </div>

                                    <div class="form-group row col-md-6">
                                        <label class="col-sm-3 col-form-label">Tél. Accomp :</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="telAccompagnant" name="telAccompagnant" placeholder="Numéro Du Accompagnant" required  />
                                        </div>
                                    </div>

                                    <div class="form-group row col-md-6">
                                        <label class="col-sm-3 col-form-label">Observat :</label>
                                        <div class="col-sm-9">
                                            <textarea placeholder="Votre Observation" id="observation" name="observation" class="form-control"  required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-primary" id="submit">Sauvegarder les modifications</button>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>



    <script>
        $(document).ready(function(){

            $('#showMessage').hide()
            $('.edit').click(function(e){
                // console.log($(this).data('id'))
                $('#id').val($(this).data('id'))
                $('#nom').val($(this).data('nom'))
                $('#prenom').val($(this).data('prenom'))
                $('#adresse').val($(this).data('adresse'))
                $('#telephone').val($(this).data('tel'))
                $('#age').val($(this).data('age'))
                $('#observation').val($(this).data('observation'))
                $('#nomAccompagnant').val($(this).data('noma'))
                $('#telAccompagnant').val($(this).data('tela'))
            })

        }
        
          
        $('#submit').click(function(e){
            e.preventDefault()
            var form_data = $('#myForm').serialize();

            $.ajax({
                url : 'update_patient',
                type: 'POST',
                data : form_data
            }).done(function(data){
                // console.log(data)
                $('#modal').modal('hide');
                location.reload();
                // $('#showMessage').show()
                Toastify({
                    text: "Patient modifié avec succès",
                    duration: 3000,
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "left", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                    onClick: function(){} // Callback after click
                    }).showToast();
            })



        })
    </script>

@endsection
