{{-- <!DOCTYPE html>
<html>
<tête>
<meta name= "_token" content= "{{ csrf_token() }}" >
<title>Recherche en direct</title>
<link rel= "stylesheet" href= "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" ></script>
</head>
<corps>
<div class= "conteneur" >
<div class= "ligne" >
<div class= "panel panel-default" >
<div class= "en-tête-de-panneau" >
<h3>Informations sur les produits </h3>
</div>
<div class= "panel-body" >
<div class= "form-group" >
<input type= "text" class= "form-controller" id= "search" name= "search" ></input>
</div>
<table class= "table table-bordered table-hover" >
<tête>
<tr>
<th>identifiant</th>
<th>Nom du produit</th>
<th>Description</th>
<th>Prix</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
</div>
</div>
</div>
<type de script= "texte/javascript" >
$ ( '#recherche' ) . on ( 'keyup' , fonction ( ) {
$value=$ ( ceci ) . val ( ) ;
$. ajax ( {
tapez : 'obtenir' ,
URL : '{{URL::to(' search ')}}' ,
données : { 'search' :$value } ,
succès : fonction ( données ) {
$ ( 'tbody' ) . html ( données ) ;
}
} ) ;
} )
</script>
<type de script= "texte/javascript" >
$. ajaxSetup ( { en-têtes : { 'csrftoken' : '{{ csrf_token() }}' } } ) ;   
</script>
</body>
</html> --}}