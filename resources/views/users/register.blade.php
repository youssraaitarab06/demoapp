@extends('./../layouts/app')
@section('page-content')
    <div class="row">

        <div class="col-md-4"></div>
        <div class="col-md-4 card m-4">
            <div class="card-body">
                <form action="{{ route('register') }}" method="post" class="form-product" enctype="multipart/form-data">
                    @csrf
                    <h4>Ajouter un utilisateur</h4>
                    <div class="form-group">
                        <label for="text">Nom</label>
                        <input type="text" class="form-control" placeholder="votre nom" name="nom"
                            value={{ old('nom') }}>
                        @error('nom')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="from-group">
                            <label for="Email">image </label>
                            <input type="file" class="form-control" name="photo" accept="image/png, image/tmp ">
                            @error('photo')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" placeholder="Votre email" name="email"
                                value={{ old('email') }}>
                            @error('email')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" placeholder="votre mot de passe" name="password">
                            @error('password')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="password">roles</label>
                            <input type="text" class="form-control" name="role">
                            @error('role')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{--  old('nom')  recuprer la valeur sasair --}}


                    <button type="submit" class="btn btn-primary" name="btn">Inscription</button>
                </form>
                <p>Déja un compte ? <a href="{{ route('login') }}"> connecter vous</a></p>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
@endsection
