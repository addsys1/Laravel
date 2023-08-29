<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Web Tech Academy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('countries') }}">Countries<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('city.index') }}">Cities</a>
            </li>
           
          </ul>
          
        </div>
      </nav>

   

    <div class="container py-5">
        <div class="row">
            
            <div class="col-md-10 mx-auto">
                <div class="card">
                <div class="card-header ">

                   
                

                    <div class="py-3">
                        <a type="button" class="btn btn-info" href="{{ route('addcountries') }}" ><i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Countries</h4>
                    
                    <table class="table responsive mx-auto">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Country Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($countries as $key =>$country)                               
                            
                            <tr>
                                <td scope="row">{{ $key +1 }}</td>
                                <td>{{ $country->name }}</td>
                                <td>
                                    <a href="{{ route('editcountries',$country->id) }}" ><i
                                        class="fas fa-edit"></i></a>

                                    <a href="{{ route('delcountries',$country->id) }}" id="delete"><i
                                        class="fas fa-trash" ></i></a>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript">
        $(function(){
          $(document).on('click','#delete',function(e){
              e.preventDefault();
              var link = $(this).attr("href");
      
        
                        Swal.fire({
                          title: 'Are you sure?',
                          text: "Delete This Data?",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                          if (result.isConfirmed) {
                            window.location.href = link
                            Swal.fire(
                              'Deleted!',
                              'Your file has been deleted.',
                              'success'
                            )
                          }
                        }) 
      
      
          });
      
        });
      
      
      </script> 


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>
    
</body>
</html>