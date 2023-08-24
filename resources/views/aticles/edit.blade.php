  {{--   @extends('./layouts/app') le contenu de la page app.blade --}}
  @extends('./layouts/app')
  {{--  @section('page-content') le contenu   a changer ou bien a ajouter a la page app.blade --}}
  @section('page-content')
  <div class="card m-4">
 
    <div class="card-body">
      <div class="row mt-2">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card -ml-3">
                <div class="card-body">
                    
               <form action="{{ route('article.update',$article->id) }}" method="POST">
                @csrf
                @method('put')
                <h4>editer un article</h4>
                <input type="text" name="titre" value="{{ $article->titre }}" class="form-control">
                 <textarea name="description" class="form-control mt-1" >{{ $article->description }}</textarea>
                 <div class="buttons">
                    <button type="submit" class="btn btn-success mt-1">Actualiser </button>
                 </div>
               </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>

      </div>
    </div>
      
  
  </div>
  @endsection