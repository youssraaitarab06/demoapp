<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    @php
         use Illuminate\Support\Facades\Storage;
    @endphp
   
    
    
</head>
<body>
    {{--   @extends('./layouts/app') le contenu de la page app.blade --}}
    @extends('./layouts/app')
    {{--  @section('page-content') le contenu   a changer ou bien a ajouter a la page app.blade --}}
    @section('page-content')
    
            <div class="container-fluid mt-4">
                <h3>liste des utilisateur</h3>
                {{-- <div class="card">
                    <div class="card-header">
                        <form action="" class="row row-cols-lg-auto g-1">
                           <div class="col">
                            <input type="text" name="q" class="form-control" value="{{ $q }} " placeholder="search here...">
                           </div>
                           <div class="col">
                           <button class="btn btn-success">search</button>
                           </div>
                        </form>

                    </div> --}}
                    @if (session()->has('success'))
                    {{-- @foreach ($errors->all() as $error)
                      <div class="alert alert-info">{{ $error }}</div>
                    @endforeach --}}
                    <div class="alert alert-success">
                        {{ session()->get('success')}}
                    </div>
                    @endif
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-striped table-sm m-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom user</th>
                                        <th>email</th>
                                        <th>image</th>
                                       
                                    </tr>
                                </thead>
                                <?php
                                $i=1;
                                ?>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{$user->email }}</td>
                                        {{-- <td>{{ $user->avatar }}</td> --}}
                                      <td>  <img src="{{ asset('images/'.$user->photo) }}" alt="Image" style="width:70px;"></td>
                                     
                                      <td>  <a href="{{ route('article.editer',$user->id)  }}" class="btn btn-info">Editer</a></td>
                                      {{-- @if ($user->statu ==0)
                                      <td>  <a href="{{ route('updatestatus',['user_id'=>$user->id,'status_code'=>1])  }}" class="btn btn-success">activer</a></td>
                                      @else
                                      <td>  <a href="{{ route('updatestatus',['user_id'=>$user->id,'status_code'=>0])  }}" class="btn btn-danger">desactiver</a></td>
                                

                                      @endif --}}
                                      
                                      <td>
                                        <a href="{{ route('users.activate', $user->id) }}" class="btn btn-success">Activate</a>
                                     <a href="{{ route('users.deactivate', $user->id) }}" class="btn btn-danger">Deactivate</a>
                                         </td>
                                      
                                      <td>
                                        <form action="{{ route('article.delete',$user->id)  }}" method="POST">
       
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