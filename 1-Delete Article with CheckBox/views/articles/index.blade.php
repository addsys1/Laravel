<!DOCTYPE html>
<html>
<head>
	<title>How to Delete Multiple Records in Laravel - Techsolutionstuff</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h2>Comment supprimer plusieurs articles in laravel </h2>
            <form method="post" action="{{ route('multideletearticles') }}">
                @csrf
                <button type="submit" class="btn btn-success ">Supprimer tous</button>

                <div class="table-responsive "  style="margin: 20px 0px">
                    <table  class="table table-striped table-hover table-bordered table-sm table-secondary border-success">
                        <thead>
                            <tr>
                                <th class="text-center">S.N</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Content</th>
                                <th class="text-center">Author</th>
                                <td class="text-center"><input type="checkbox" id="checkAll"> Select all </td>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($articles as $key => $article)
                                                           
                            <tr>
                                <td class="text-center" width="5%">{{ $key+1 }}</td>
                                <td class="text-center" width="25%">{{ $article->title }}</td>
                                <td class="text-center" width="30%">{{ $article->content }}</td>
                                <td class="text-center">{{ $article->author }}</td>
                                <td class="text-center"><input name="id[]" type="checkbox"  value="{{ $article->id }}" ></td>
                                

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </form>



        </div>
    </div>
</div>


<script>
    document.querySelector("#checkAll").addEventListener("click", function() {
      var checkboxes = document.querySelectorAll("input[type='checkbox']");
      checkboxes.forEach(function(checkbox) {
        if (checkbox !== this) {
          checkbox.checked = this.checked;
        }
      }, this);
    });
    
    </script>

</body>