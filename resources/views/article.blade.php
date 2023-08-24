<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>article</title>
    @php
        use Carbon\Carbon;
    @endphp
</head>

<body>
    {{--   @extends('./layouts/app') le contenu de la page app.blade --}}
    @extends('./layouts/app')
    {{--  @section('page-content') le contenu   a changer ou bien a ajouter a la page app.blade --}}
    @section('page-content')
        {{-- <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident dolorum porro eum ut iste omnis.
         Quo illum nam enim quidem, expedita incidunt, 
         amet labore saepe veritatis repellendus explicabo voluptatem 
         laborum.</p>  --}}
        <?php
        //  if (isset($_POST['btn'])) {
        //     echo 'ok';
        //     # code...
        //  }
        //
        ?>


        {{-- @error('nom')
        <p>le champs nom est requis</p>
            
        @enderror
        @error('email')
        <p>le champs email est requis</p>
            
        @enderror --}}
        <div class="container mt-4">


            <div class="row">
                @auth
                    <div class="card w-50 col-6">

                        <div class="card-body">
                            @if (session()->has('success'))
                                {{-- @foreach ($errors->all() as $error)
                              <div class="alert alert-info">{{ $error }}</div>
                            @endforeach --}}
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <form action="{{ route('article') }}" method="post" class="form-product">
                                @csrf
                                <h4>Enregistrer un article</h4>
                                <div class="form-group">
                                    <label for="text">Titre</label>
                                    <input type="text" class="form-control" placeholder="le titre de l'article"
                                        name="titre" value={{ old('titre') }}>
                                    @error('titre')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <textarea name="description" class="form_control mt-2" cols="65" rows="5" value={{ old('description') }}></textarea>
                                    @error('description')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label for="text">Date debut</label>
                                    <input type="date" class="form-control" name="dateD" min="<?= date('Y-m-d') ?>"
                                        value={{ old('dateD') }}>
                                    @error('dateD')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label for="text">date fin</label>
                                    <input type="date" class="form-control" min="<?= date('Y-m-d') ?>" name="dateF"
                                        value={{ old('dateF') }}>
                                    @error('dateF')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <label for="quantite">quantite</label>
                                    <input type="text" class="form-control" name="quantite" value={{ old('quantite') }}>
                                    @error('quantite')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{--  old('nom')  recuprer la valeur sasair --}}

                                {{-- <input type="email" class="form-control" placeholder="Email" name="email" value={{ old('email') }}> --}}
                                <button type="submit" class="btn btn-info" name="btn">Ajouter</button>
                            </form>
                        </div>
                    </div>

                @endauth


                <div class="col-md-6">
                    <ul class="list-group mt-2 left-10">
                        <li class="list-group-item active" aria-current="true">Article disponiple</li>
                        @forelse ($articles as $article)
                            <a href="/article/{{ $article->id }}" class="list-group-item">{{ $article->titre }}</a>
                            <li class="list-group-item">{{ $article->description }}</li>
                            <li>
                                <?php
                                // parse($article->dateD); permet de convertir la date a chaine de carataire
                                $dateD = Carbon::parse($article->dateD);
                                $dateF = Carbon::parse($article->dateF);
                                // diffforhumans la duree  entre la date d jusqua la  date f  (after)
                                // $printedate= $dateF->diffforhumans(Carbon::now());
                                
                                // diffforhumans la duree  entre la date f jusqua la  date d  (brfore)
                                // $printedate= $dateD->diffforhumans(Carbon::now());
                                
                                // la diference entre les jours ( la diff entre la journee  la date de fin et de  cette jours)
                                //   $printedate= $dateF->diffIndays(Carbon::now());
                                
                                //  la deference entre la date f et date D  (avec jours)
                                $printedate = $dateF->diffIndays($dateD);
                                
                                //  la deference entre la date f et date D  (avec jours) mais avec les valeurs % les vrai valus
                                //   $printedate= $dateF->floatDiffIndays( $dateD);
                                
                                //  la deference entre la date f et date D  (avec sumaines )
                                // $printedate= $dateF->diffInWeeks( $dateD);
                                
                                //  la deference entre la date f et date D  (avec mois)
                                // $printedate= $dateF->diffInMonths( $dateD);
                                
                                //  la deference entre la date f et date D  (avec les annee)
                                // $printedate= $dateF->diffInYears( $dateD);
                                
                                //  la deference entre la date f et date D  (avec les heurs)
                                // $printedate= $dateF->diffInhours( $dateD);
                                
                                //  la deference entre la date f et date D  (avec les minutes)
                                // $printedate= $dateF->diffInMinutes( $dateD);
                                
                                //  la deference entre la date f et date D  (avec les seconds)
                                // $printedate= $dateF->diffInseconds( $dateD);
                                
                                ?>
                                {{ $printedate }}
                            </li>
                        @empty
                            <li class="list-group-item active" aria-current="true">Aucun article trouvé</li>
                        @endforelse

                    </ul>
                    <div>
                        {{ $articles->links() }}
                    </div>
                    
                </div>

            </div>
        </div>
    @endsection

</body>

</html>
