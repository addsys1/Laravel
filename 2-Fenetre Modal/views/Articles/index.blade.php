<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Crud Modlal</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-10  mx-auto">

                <h1>CRUD Modal</h1>

                <div class="py-3">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg" ><i class="fas fa-plus"></i></button>
                </div>


                <div class="card">
                    <div class="card-header text-center">
                        <h3>Articles</h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="mytable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="10%" text-center>S.N</th>
                                        <th width="25%" text-center>Title</th>
                                        <th width="30%" text-center>Content</th>
                                        <th width="15%" text-center>Author</th>7
                                        <th>Action</th>
                                    </tr>

                                    
                                </thead>

                                <tbody>
                                    @foreach ($articles as $key => $article)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{ $article->title }}</td>
                                        <td>{{ $article->content }}</td>
                                        <td>{{ $article->author }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center align-item-center">
                                                <a class="modal-effect btn  btn-warning mx-1" data-effect="effect-scale"
                                                    data-id="{{ $article->id }}"
                                                    data-title="{{ $article->title }}"
                                                    data-content ="{{ $article->content }}"
                                                    data-author ="{{ $article->author }}"
                                                    data-toggle="modal" href="#editModal2" title="Update"><i
                                                        class="fas fa-edit"></i></i></a>


                                            <a class="modal-effect btn  btn-danger mx-1" data-effect="effect-scale"
                                            data-id="{{ $article->id }}"
                                            data-title="{{ $article->title }}"
                                            data-toggle="modal" href="#deleteModal" title="Destroy"><i
                                                class="fas fa-trash"></i></a>
                                            </div>

                                        </td>
                                    </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                {{-- Create Modal  --}}

                <div class="modal fade" id="modal-lg">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Article</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            {{-- Form  --}}
                            <form method="post" action="{{ route('addarticle') }}">
                                @csrf
                                <div class="modal-body">
    
    
    
    
                                    <div class="form-group row align-items-center">
                                        <label for="input_id_0" class="col-sm-2 col-form-label">Title :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" id="title"
                                                placeholder="Title..." >
                                        </div>
                                    </div>

                                    
                                    <div class="form-group row align-items-center">
                                        <label for="input_id_0" class="col-sm-2 col-form-label">Content :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="content" id="content"
                                                placeholder="Content..." >
                                        </div>
                                    </div>


                                        
                                    <div class="form-group row align-items-center">
                                        <label for="input_id_0" class="col-sm-2 col-form-label">Author :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="author" id="author"
                                                placeholder="Author..." >
                                        </div>
                                    </div>
    
    
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                                    <button type="submit" class="btn btn-primary">Valider</button>
                                </div>
                            </form>
                            {{-- End form  --}}
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- / End .modal Create -->


                {{-- Modal Edit  --}}

            <!-- edit -->
            <div class="modal fade" id="editModal2" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Article</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('editarticle') }}" method="post" autocomplete="off">
                           
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="">
                                <label for="recipient-name" class="col-form-label">Title :</label>
                                <input class="form-control" name="title" id="title"
                                    type="text">
                            </div>

                            <div class="form-group">
                                
                                <label for="recipient-name" class="col-form-label">Content :</label>
                                <input class="form-control" name="content" id="content"
                                    type="text">
                            </div>

                            <div class="form-group">
                                
                                <label for="recipient-name" class="col-form-label">Author :</label>
                                <input class="form-control" name="author" id="author"
                                    type="text">
                            </div>

                           

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Valider</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End modal edit  --}}


         {{-- debut modal delete --}}

         <div class="modal" id="deleteModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Delete Article</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('deletearticle') }}" method="post">
                        
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>Are you sure to delete ?</p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="title" id="title"
                                type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Valider</button>
                        </div>
                </div>
                </form>
            </div>
        </div>

        {{-- End delete Modal  --}}

            </div>
        </div>
    </div>



    







 



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


    <script>
        // Fonction pour remplir la modale "Edit" avec les valeurs de l'article
        function fillEditModal(id, title, content, author) {
            var modal = document.getElementById('editModal2');
            modal.querySelector('#id').value = id;
            modal.querySelector('#title').value = title;
            modal.querySelector('#content').value = content;
            modal.querySelector('#author').value = author;
        }

        // Gestionnaire d'événement pour le bouton "Update" qui remplit la modale "Edit" avec les valeurs
        var updateButtons = document.querySelectorAll('.modal-effect.btn-warning');
        updateButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                var id = button.getAttribute('data-id');
                var title = button.getAttribute('data-title');
                var content = button.getAttribute('data-content');
                var author = button.getAttribute('data-author');
                fillEditModal(id, title, content, author);
            });
        });
    </script>


    {{-- Delete en Js  --}}
    <script>
        // Fonction pour définir l'ID de l'article à supprimer
        function setDeleteArticleId(id,title) {
            var deleteForm = document.getElementById('deleteModal');
            deleteForm.querySelector('#id').value = id;
            deleteForm.querySelector('#title').value = title;
        }
    
        // Gestionnaire d'événement pour le bouton "Delete" qui définit l'ID de l'article à supprimer
        var deleteButtons = document.querySelectorAll('.modal-effect.btn-danger');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                var id = button.getAttribute('data-id');
                var title = button.getAttribute('data-title');
                setDeleteArticleId(id,title);
            });
        });
    </script>


    {{-- End delete en Js  --}}



      {{-- Pour  Edit  --}}
      {{-- <script>
        $('#editModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var title = button.data('title')
            var content = button.data('content')
            var author = button.data('author')

            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #title').val(title);
            modal.find('.modal-body #content').val(content);
            modal.find('.modal-body #author').val(author);
            

        })
    </script> --}}


        {{-- Delete  --}}
        {{-- <script>
            $('#deleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var title = button.data('title')
                var modal = $(this)
                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #title').val(title);
            })
        </script> --}}
    
        {{-- End Delete   --}}


   



</body>
</html>