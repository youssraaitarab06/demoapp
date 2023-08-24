@extends('./../layouts/app')
@section('page-content')
<div class="row">

<div class="col-md-4"></div>
<div class="col-md-4 card m-4">
<div class="card-body" >
    @if (session()->has('error'))
    {{-- @foreach ($errors->all() as $error)
      <div class="alert alert-info">{{ $error }}</div>
    @endforeach --}}
    <div class="alert alert-danger">
        {{ session()->get('error')}}
    </div>
    @endif
    {{-- @if (session()->has('success')) --}}
    {{-- @foreach ($errors->all() as $error)
      <div class="alert alert-info">{{ $error }}</div>
    @endforeach --}}
    {{-- <div class="alert alert-success">
        {{ session()->get('success')}}
    </div> --}}
    {{-- @endif --}}
    <form action="{{ route('login') }}" method="POST" class="form-product">
        @csrf
        <h4>Connecter vous</h4>
        
            
            <div class="from-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" placeholder="Votre email" name="email" value={{ old('email') }}>
                @error('email')
                <div class="text text-danger">
                    {{ $message }}
                </div>
                 @enderror
            </div>
            <div class="from-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" placeholder="votre mot de passe" name="password" >
                @error('password')
                <div class="text text-danger">
                    {{ $message }}
                </div>
                 @enderror
            </div>
           
           
        {{--  old('nom')  recuprer la valeur sasair --}}
       
        
        <button type="submit" class="btn btn-primary" name="btn">login</button>
        </form>
        <p>Aucun compte ? <a href="{{ route ('register')}}"> Inscrivez vous</a></p>
 </div>        
</div>
<div class="col-md-4"></div>
</div>

    @endsection