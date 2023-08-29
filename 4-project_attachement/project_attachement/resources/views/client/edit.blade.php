<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-10 py-5">

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home"
                            type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Client</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile"
                            type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Profile</button>
                    </li>


                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        {{-- ----------------begin 1---------- --}}
                        <div class="card">
                            <div class="card-header bg-primary">
                                <div class="text-center ">
                                    <h2>Add Client</h2>
                                </div>
                            </div>
                            <div class="card-body py-5">

                                <form method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row align-items-center">
                                        <label for="input_id_0" class="col-sm-2 col-form-label">Client Name :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="client_name"
                                                id="input_id_0" placeholder="Client Name..."
                                                value="{{ old('client_name',$client->client_name) }}">
                                        </div>
                                    </div>

                                    

                                    <div class="form-group row align-items-center">
                                        <label for="input_id_0" class="col-sm-2 col-form-label">Email :</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" id="input_id_0"
                                                placeholder="Email..." value="{{ old('email',$client->email) }}">
                                        </div>
                                    </div>


                                    <div class="form-group row align-items-center">
                                        <label for="input_id_0" class="col-sm-2 col-form-label">National Id :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="national_id"
                                                id="input_id_0" placeholder="National Id..."
                                                value="{{ old('national_id',$client->national_id) }}">
                                        </div>
                                    </div>


                                    


                                    {{-- gestion validation  --}}

                                    {{-- @if ($errors->any())
                                    
                                        @foreach ($errors->all() as $error)
                                        
                                            <li>{{$error}}</li>
                                        @endforeach
                                    
                                    @endif --}}


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">
                                            Edit Client
                                        </button>

                                    </div>

                                </form>


                            </div>
                        </div>


                        {{-- ------------------End 1 ----------------- --}}
                    </div>



                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        {{-- ----------------begin 2---------- --}}
                        <!--Attachements-->
                        <div class="card card-statistics">

                            <div class="card-body">
                                <p class="text-danger">* Format attachment  pdf, jpeg ,.jpg , png </p>
                                <h5 class="card-title">Ajouter attachment </h5>
                                <form method="post" action="{{ route('store_added_file') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="custom-file">



                                        <input type="file" id="customFile" class="custom-file-label"
                                            name="file_name" required>
                                        <input type="hidden" id="client_name" name="client_name"
                                            value="{{ $client->client_name }}">
                                        <input type="hidden" id="client_id" name="client_id"
                                            value="{{ $client->id }}">
                                        <label class="form-label" for="customFile">Select Attachment
                                                                                 </label>
                                    </div><br><br>
                                    <button type="submit" class="btn btn-primary btn-sm ">Confirmer</button>
                                </form>
                            </div>

                            <br>

                            <div class="table-responsive mt-15">
                                <table class="table center-aligned-table mb-0 table table-hover"
                                    style="text-align:center">
                                    <thead>
                                        <tr class="text-dark">
                                            <th scope="col">Num</th>
                                            <th scope="col">File Name</th>

                                            <th scope="col">Created Date</th>
                                            <th scope="col">Actions</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($attachements as $key => $attachement)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $attachement->file_name }}</td>
                                                <td>{{ $attachement->created_at }}</td>
                                                <td colspan="2">
                                                    <a class="btn btn-outline-success btn-sm"
                                                        href="{{ route('view.file', ['clientName' => $client->client_name, 'fileName' => $attachement->file_name]) }}"
                                                        role="button"><i class="fas fa-eye"></i>&nbsp;
                                                        Affichage</a>

                                                    <a class="btn btn-outline-info btn-sm"
                                                        href="{{ route('download.file', ['client_name' => $client->client_name, 'file_name' => $attachement->file_name]) }}"
                                                        role="button"><i class="fas fa-download"></i>&nbsp;
                                                        Download</a>

                                                    <button class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                        data-file_name="{{ $attachement->file_name }}"
                                                        data-client_name="{{ $attachement->client_name }}"
                                                        data-id_file="{{ $attachement->id }}"
                                                        data-target="#delete_file">Delete</button>

                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                    </tbody>
                                </table>

                            </div>
                            {{-- End attachement  --}}

                            {{-- ------------------End  ----------------- --}}
                        </div>


                    </div>

                </div>
            </div>
        </div>


        <!-- delete -->
        <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Attachment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('delete.file') }}" method="post">
    
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> Are you sure to delete Attachment ؟</h6>
                        </p>
    
                        <input type="hidden" name="id_file" id="id_file" value="">
                        <input type="hidden" name="file_name" id="file_name" value="">
                        <input type="hidden" name="client_name" id="client_name" value="">
    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Confirmer</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- end delete  --}}


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>


        <script>
            $('#delete_file').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id_file = button.data('id_file')
                var file_name = button.data('file_name')
                var client_name = button.data('client_name')
                var modal = $(this)
          
                modal.find('.modal-body #id_file').val(id_file);
                modal.find('.modal-body #file_name').val(file_name);
                modal.find('.modal-body #client_name').val(client_name);
            })
          
          </script>
</body>

</html>
