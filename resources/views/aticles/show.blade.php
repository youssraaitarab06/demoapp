  {{--   @extends('./layouts/app') le contenu de la page app.blade --}}
  @extends('./layouts/app')
  {{--  @section('page-content') le contenu   a changer ou bien a ajouter a la page app.blade --}}
  @section('page-content')
  <div class="card m-4">
 
    <div class="card-body">
      <a href="/article">retour</a>
        {{-- @foreach ($articles as $a) --}}
        <div class="title">{{ $article->titre}}</div>
        <p>{{ $article->description }}</p> 
        <hr>
        @foreach ($article->magasins as  $magasin)
        <p>{{  $magasin->name }}</p> 
        <li>  {{  $magasin->pivot()->quantite }}</li>
          
        @endforeach
      
        {{-- @endforeach --}}
    </div>
    @auth
    @if(Auth::user()->id ==$article->user_id)
    <div class="card-footer">
        
      {{-- /article/{{ $article->id }}/edit --}}
      <a href="{{ route('article.editer',$article->id)  }}" class="btn btn-info">Editer</a>
      <form action="{{ route('article.delete',$article->id)  }}" method="POST">
       
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">supprimer</button>
      </form>
    </div> 
    @endif
    
    @endauth
     
 
  </div>
  @endsection