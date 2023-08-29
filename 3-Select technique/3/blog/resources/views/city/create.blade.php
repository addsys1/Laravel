<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="text-center ">
                            <h2>Add City</h2>
                        </div>

                        <div class="card-body py-5 ">

                            <form method="Post" action="{{ route('city.store') }}" >
                                @csrf
                                <div class="form-group row mx-auto text-center" >
                            
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="City Name..." value="{{old('name')}}">
                                    
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
    
                                    </div>


                                    
                                    <div class="col-sm-12 py-3">
                                        <div class="form-group">
                                            
                                            <div class="controls">
                                            <select name="country_id" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select Country</option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach	 
                                                </select>
                                            </div>
                                        </div> <!-- // end form group -->
                                    </div>

                                    <div class="col-sm-12 ">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">
                                                Add City
                                            </button>
                                        </div>
            
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>