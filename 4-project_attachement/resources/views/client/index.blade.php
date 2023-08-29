<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


    
    
  


    <title>Document</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-11 mx-auto">
                
                <div class="py-3">
                    <a href="{{route('client.create')}}" class="btn btn-warning">Create Client</a>
                </div>


                <div class="card">
                    <div class="card-header text-center">
                        <h3>Clients</h3>
                    </div>
    
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="mytable" class="table table-bordered table-striped">
                            {{-- <table id="myTable" class="table table-striped table-bordered table-sm "> --}}
                              <thead>
                                <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">Client Name</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">National Id</th>
                                  <th scope="col">Actions</th>
                                  
                                </tr>
                              </thead>
                              <tbody class="">
    
                                
    
                                @foreach ($clients as $key => $client)
                                    
                                
                                <tr>
                                  
                                  <td>{{$key+1}}</td>
                                  <td>{{$client->client_name}}</td>
                                  <td>{{$client->email}}</td>
                                  <td>{{$client->national_id}}</td>
                                  <td class="d-flex justify-content-center align-items-center">
                                   
    
                                    
    
                                    <a class="btn btn-info mx-2" href="{{route('client.edit',$client->id)}}">
                                       Update
                                    </a>
    
                                  
    
    
                                    
    
    
                                    <form id="deleteForm"  method="post" action="{{route('client.delete',$client->id)}}">
                                        @csrf
                                        @method('delete')  
                                        
                                        <button type="submit"  class="btn btn-danger confirm">
                                            Delete
                                        </button>
                                                                              
                                        
                                    </form>
    
                                   
    
                                    
                                  </td>
                                </tr>
    
                                @endforeach
                               
                                
                              </tbody>
                          
                            </table>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
      //the confirm class that is being used in the delete button
      $('.confirm').click(function(event) {
  
                //This will choose the closest form to the button
                var form =  $(this).closest("form");
  
                //don't let the form submit yet
                event.preventDefault();
  
                //configure sweetalert alert as you wish
                Swal.fire({
                    title: 'Are you sure ?',
                    text: "you do not return ",
                    cancelButtonText: "Close",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Delete'
                }).then((result) => {
                    
                    //in case of deletion confirm then make the form submit
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
                });
  </script>
</body>
</html>