<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    {{--   @extends('./layouts/app') le contenu de la page app.blade --}}
    @extends('./layouts/app')
    {{--  @section('page-content') le contenu   a changer ou bien a ajouter a la page app.blade --}}
    @section('page-content')
    
            <div class="container-fluid mt-4">
                <h3>liste des articles</h3>
                <div class="card">
                    <div class="card-header">
                        <form action="" class="row row-cols-lg-auto g-1">
                           <div class="col">
                            <input type="text" name="q" class="form-control" value="{{ $q }} " placeholder="search here...">
                           </div>
                           <div class="col">
                           <button class="btn btn-success">search</button>
                           </div>
                        </form>

                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-striped table-sm m-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom user</th>
                                        <th>email</th>
                                        <th>titre</th>
                                        <th>description</th>
                                        <th>userID</th>
                                    </tr>
                                </thead>
                                <?php
                                $i=1;
                                ?>
                                @foreach ($articles as $article )
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $article->name }}</td>
                                        <td>{{ $article->email }}</td>
                                        <td>{{ $article->titre }}</td>
                                        <td>{{$article->description  }}</td>
                                        <td>{{$article->user_id  }}</td>
                                      <td>  <a href="{{ route('article.editer',$article->id)  }}" class="btn btn-info">Editer</a></td>
                                      <td>
                                        <form action="{{ route('article.delete',$article->id)  }}" method="POST">
       
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">supprimer</button>
                                          </form>
                                      </td>
                                        
                                    </tr>
                                @endforeach

                        </table>
                    </div>
                </div>


                
           
                <div class="row">

       
</div>
</div>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" ></script>
    
</body>
</html>