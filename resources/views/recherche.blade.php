<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>recherche</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <h4 class="mb-4">Barre de rechrche</h4>
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('search') }}" method="get" style="display: flex">
                <input type="text" placeholder="Rechercher" class="form-control " name="search" value="{{ request()->get('search') }}" >
                <button class="btn btn-primary" type="submit">search</button>

            </form>
        </div>
    
    <div class="row mt-2">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>#</th>
                    <th>Titre</th>
                    <th>description</th>
                </thead>
                <tbody>
                    @forelse ($articles as $item )
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->titre }}</td>
                        <td>{{ $item->description }}</td>
                    </tr>
                        
                    @empty
                        
                    @endforelse

                </tbody>

            </table>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>