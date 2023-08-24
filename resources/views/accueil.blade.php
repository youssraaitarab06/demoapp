<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accuiel</title>
</head>
<body>
    <h1>cc cv</h1>
    <div> Nom de l utilisateur:{{$userName}},{{ $age }}</div>
    <h1>avec le php</h1>
    <?php
    if($userName=='yousra'){
        ?> <p>message losque le nom est yousra</p><?php  }
        else {
           ?> <p>message losque le nom ce  n'est pas  yousra </p><?php
        }
    ?>
{{-- if  --}}

    <h1>avec  blade</h1>
    @if ($userName=='yousra')
    <p>message losque le nom est yousra</p>
    @else
    <p>message losque le nom ce  n'est pas  yousra </p>   
    @endif

{{--switch  --}}
    <h1>switch avec  blade</h1>
    @switch($age)
        @case($age<16)
        <p>L'utilisateur est encore mineur </p>
            
            @break
            @case($age>=16)   
            <p>L'utilisateur peut s'inscrire</p> 
            @break
    
        @default
        <p>doit connait votre age pour s'inscrire</p> 
    @endswitch
    <h1>isset la fonction qui permet de verifier si quelque chose est exist ou pas</h1>
    <h3>isset avec php</h3>


    {{-- isset php --}}
<?php
//   $produit='';
    if(isset($produit)){
        echo'Ceci est un produit exist';
    }
    ?>



      {{-- @isset  @empty et  blade --}}
       <h3>isset avec blade</h3>
       @isset($produit)
       <p>le produit exist</p>  
        {{--on peut utiliser des @if @else  --}}
       @endisset
       <h3>empty verifier si une vaiable est vide</h3>
       @empty($produit)
       <p>valeur de produit est vide  ou non defini</p>
       @endempty


       
       {{-- while evec blade  --}}
       <h3>while avec blade </h3>
       @while ($age <18)
       <p>l'age est infirieur a 18 ans</p>
           @break
       @endwhile


       {{-- for evec blade  --}}
       @for ($i=14 ;$i<=$age;$i++)
       <p>l'age est {{ $i }}</p>
       @endfor


        {{-- @foreach pour aficher les different valeur  --}}
        <h3>foreach pour aficher les different valeur </h3>
        {{-- @foreach ($nums as $num )
        <p>le numeros est {{$num}}</p>
        @endforeach --}}

        {{-- count($nums)>=1  il ya en moins une valeur dans tableau --}}
        @if (count($nums)>=1)
        {{-- il afficher direct les valeurs exist dans le tableau --}}

         @else
         <p>Aucun  numeros fourni</p>
            
        @endif

      {{--  si le tableau est vide --}}
        @forelse ($nums as $num )
        <p>le numeros est {{$num}}</p>
        {{-- dans le cas la valeur passer est vide  --}}
        @empty
        <p>Aucun  numeros fourni</p>
      
        @endforelse
<h3>les layouts -> des templase</h3>

  
</body>
</html>