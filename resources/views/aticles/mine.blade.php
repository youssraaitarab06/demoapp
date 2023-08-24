  {{--   @extends('./layouts/app') le contenu de la page app.blade --}}
  @extends('./layouts/app')
  {{--  @section('page-content') le contenu   a changer ou bien a ajouter a la page app.blade --}}
  @section('page-content')
 <div class="row">
    <div class="col-md-6">
        <ul class="list-group mt-2 left-10">
            <li class="list-group-item active" aria-current="true">Article disponiple</li>
            @forelse ($myarticles as $article)
           
                <a href="/article/{{ $article->id }}" class="list-group-item">{{ $article->titre }}</a>
                <li class="list-group-item">{{ $article->description }}</li>
              
            @empty
                 <li class="list-group-item active" aria-current="true">Aucun article trouvé</li>
            @endforelse
           
          </ul>
     </div>
     <div class="col-md-6">
        <a href="{{ route('article.generatepdf') }}"  target="_blank" class="btn btn-secondary"><i class="fas fa-file-pdf"></i> print</a>

     </div>
 </div>
  @endsection