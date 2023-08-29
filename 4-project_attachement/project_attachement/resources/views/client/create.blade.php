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
                      <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Client</button>
                    </li>
                   
                    
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        {{-- ----------------begin 1---------- --}}
                        <div class="card">
                            <div class="card-header bg-primary">
                                <div class="text-center ">
                                    <h2>Add Client</h2>
                                </div>
                            </div>
                            <div class="card-body py-5">
                        
                                <form method="post" action="{{route('client.store')}}" enctype="multipart/form-data">
                                  @csrf
                                    <div class="form-group row align-items-center">
                                        <label for="input_id_0" class="col-sm-2 col-form-label">Client Name :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="client_name" id="input_id_0" placeholder="Client Name..." value="{{old('client_name')}}">
                                        </div>
                                    </div>
            
                                    <div class="form-group row align-items-center">
                                        <label for="input_id_0" class="col-sm-2 col-form-label">Email :</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" id="input_id_0" placeholder="Email..." value="{{old('email')}}">
                                        </div>
                                    </div>
            
            
                                    <div class="form-group row align-items-center">
                                        <label for="input_id_0" class="col-sm-2 col-form-label">National Id :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="national_id" id="input_id_0" placeholder="National Id..." value="{{old('national_id')}}">
                                        </div>
                                    </div>
            
            
                                    <p class="text-danger">* Format pdf, jpeg ,.jpg , png </p>
                                    <h5 class="card-title">Attachement :</h5>
            
                                    
                                    <div class="col-sm-12 col-md-12">
                                        <input type="file" name="pic" class="dropify" accept=".pdf,.jpg,.png, image/jpeg, image/png"
                                            data-height="70" />
                                    </div><br>
                                        
            
                                    {{-- gestion validation  --}}
            
                                    {{-- @if($errors->any())
                                    
                                        @foreach($errors->all() as $error)
                                        
                                            <li>{{$error}}</li>
                                        @endforeach
                                    
                                    @endif --}}
            
            
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">
                                            Add Client
                                        </button>
            
                                    </div>
                                    
                                </form>
                        
                        
                            </div>
                        </div>


                        {{-- ------------------End 1 ----------------- --}}
                    </div>
                   
                    
                  </div>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
